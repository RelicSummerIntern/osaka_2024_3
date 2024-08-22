<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function store($order_number)
    {
        $data = DB::select('
            SELECT DISTINCT b.order_number, g.date, tic.game_id, gtimes.actual_end_time, sn.id AS seat_number_id, sa.id AS seat_area_id, e.enter_time, e.exit_time, b.id AS buyer_id, sa.price
            FROM buyers b
            LEFT OUTER JOIN tickets tic ON b.ticket_id = tic.id
            LEFT OUTER JOIN games g ON tic.game_id = g.id
            LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id
            LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id
            LEFT OUTER JOIN teams t ON gteam.team_id = t.id
            LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id
            LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id
            LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id
            LEFT OUTER JOIN enters e ON e.buyer_id = b.id
            WHERE b.order_number = '.$order_number);

        if (empty($data)) {
            return redirect()->route('/')->with('error', 'No data found for the given order number.');
        }

        $exists = Payments::where('buyer_id', $data[0]->buyer_id)->exists();

        if ($exists) {
            $data = DB::select('SELECT * FROM payments WHERE buyer_id = '.$data[0]->buyer_id);
            return redirect()->route('payments.show',['buyer_id'=>$data[0]->buyer_id]);
        }

        $actualEndTime = new DateTime($data[0]->actual_end_time);
        $exitTime = $data[0]->exit_time ? new DateTime($data[0]->exit_time) : $actualEndTime;

        $interval = $actualEndTime->diff($exitTime);
        $minutes = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
        $price = $minutes / 10 * 100 + $data[0]->price;

        $payment = new Payments;
        $payment->buyer_id = $data[0]->buyer_id;
        $payment->payment = $price;
        $payment->save();

        return redirect()->route('payments.show',['buyer_id'=>$data[0]->buyer_id]);
    }

    public function show($buyer_id)
    {
        $data = DB::select('
            SELECT p.payment
            FROM buyers b
            LEFT OUTER JOIN tickets tic ON b.ticket_id = tic.id
            LEFT OUTER JOIN games g ON tic.game_id = g.id
            LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id
            LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id
            LEFT OUTER JOIN teams t ON gteam.team_id = t.id
            LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id
            LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id
            LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id
            LEFT OUTER JOIN enters e ON e.buyer_id = b.id
            LEFT OUTER JOIN payments p ON p.buyer_id = b.id WHERE p.buyer_id = '.$buyer_id.' AND b.user_id = '.Auth::user()->id);
        // 支払いの一覧を表示する処理を追加
        return view('tickets.payments', compact('data'));
    }

}
