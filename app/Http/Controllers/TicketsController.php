<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Buyers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    #TOPページ用
    public function index()
    {
        $games = DB::select('SELECT DISTINCT g.id, g.date, g.scheduled_start_time, g.scheduled_end_time, gtimes.actual_start_time,gtimes.actual_end_time,tou.tournament_name FROM games g LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id WHERE tou.id = 1;');
        $teams = DB::select('SELECT g.id,t.team_name FROM games g LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id WHERE tou.id = 1');
        $sold = DB::select('SELECT g.id, COUNT(b.id) AS sold_num FROM buyers b LEFT OUTER JOIN tickets tic ON b.ticket_id = tic.id LEFT OUTER JOIN games g ON tic.game_id = g.id LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id LEFT OUTER JOIN users u ON b.user_id = u.id LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id GROUP BY g.id;');
        $selling = DB::select('SELECT g.id, COUNT(tic.id) AS selling_num FROM tickets tic LEFT OUTER JOIN games g ON tic.game_id = g.id LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id LEFT OUTER JOIN tournament tou ON tou.id = sa.tournament_id WHERE tou.id = 1 GROUP BY g.id;');
        return view('home', compact('games','teams','sold','selling'));
    }

    /**
     * Display the specified resource.
     */

     #座席指定ページ用
    public function show($id)
    {
        $seats = DB::select('SELECT DISTINCT g.id, g.date, g.scheduled_start_time, tou.tournament_name, sa.id AS seat_id, sa.name AS seat_name, b.id AS buyer_id FROM tickets tic LEFT OUTER JOIN games g ON tic.game_id = g.id LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id LEFT OUTER JOIN buyers b ON tic.id = b.ticket_id WHERE g.id ='.$id);
        return view('tickets.seat', compact('seats'));
    }


    /**
     * Show the form for creating a new resource.
     */

    #枚数選択ページ用
    public function create($seat_number_id,$game_id)
    {
        $tickets = DB::select('SELECT DISTINCT g.id, g.date, g.scheduled_start_time,g.scheduled_end_time, tou.tournament_name, sn.name AS seat_number,sa.name AS seat_name, sa.price, tic.id AS ticket_id, b.id AS buyer_id FROM tickets tic LEFT OUTER JOIN games g ON tic.game_id = g.id LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id LEFT OUTER JOIN buyers b ON tic.id = b.ticket_id WHERE g.id = '.$game_id.' AND sa.id = '.$seat_number_id);
        return view('tickets.number', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     */

    # 枚数選択後データ保存
    public function store(Request $request,$ticket_id)
    {
        for($i = 0; $i < $request->adult; $i++){
            $order_number = mt_rand(1000000, 9999999);
            $buyer = new Buyers;
            $buyer->user_id = Auth::id();
            $buyer->ticket_id = $ticket_id;
            $buyer->order_number = $order_number;

            $buyer->save();
        }

        return redirect('tickets/code/'.$order_number);
    }

    # QRコードを表示
    public function show_code($order_number)
    {
        $order = DB::select('SELECT b.order_number FROM buyers b LEFT OUTER JOIN tickets tic ON b.ticket_id = tic.id LEFT OUTER JOIN games g ON tic.game_id = g.id LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id WHERE b.order_number ='.$order_number);
        return view('tickets.showCode', compact('order'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
