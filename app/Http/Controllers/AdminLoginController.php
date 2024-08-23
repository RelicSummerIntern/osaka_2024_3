<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    //ログインページの表示
    public function index()
    {
      return view('admin.index');
    }
    //ログイン処理
    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      //ユーザー情報が見つかったらログイン
      if (Auth::guard('admin')->attempt($credentials)) {
        //ログイン後に表示するページにリダイレクト
        return redirect()->route('admin.dashboard')->with([
          'login_msg' => 'ログインしました。',
        ]);
      }

      //ログインできなかったときに元のページに戻る
      return back()->withErrors([
        'login' => ['ログインに失敗しました'],
      ]);
    }

    //ログアウト処理
    public function logout(Request $request)
    {
      Auth::guard('admins')->logout();
      $request->session()->regenerateToken();

      //ログインページにリダイレクト
      return redirect()->route('admin.login.index')->with([
        'logout_msg' => 'ログアウトしました',
      ]);
    }

    public function dashboard()
    {
        $games = DB::select('SELECT DISTINCT g.id, g.date, g.scheduled_start_time, g.scheduled_end_time, gtimes.actual_start_time,gtimes.actual_end_time,tou.tournament_name FROM games g LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id WHERE tou.id = 1;');
        $teams = DB::select('SELECT g.id,t.team_name FROM games g LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id WHERE tou.id = 1');
        $buyers = DB::select('SELECT DISTINCT b.order_number,b.id AS buyer_id, g.id, g.date, g.scheduled_start_time, g.scheduled_end_time,gtimes.actual_start_time,gtimes.actual_end_time,tou.tournament_name, sn.name,sa.name, e.enter_time, e.exit_time FROM buyers b LEFT OUTER JOIN tickets tic ON b.ticket_id = tic.id LEFT OUTER JOIN games g ON tic.game_id = g.id LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id LEFT OUTER JOIN users u ON b.user_id = u.id LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id LEFT OUTER JOIN enters e ON e.buyer_id = b.id ORDER BY g.id ASC;');
        return view('admin.dashboard', compact('games','teams','buyers'));
    }
}
