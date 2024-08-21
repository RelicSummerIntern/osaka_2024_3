<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = DB::select('SELECT DISTINCT g.id, g.date, g.scheduled_start_time, tou.tournament_name, sn.name AS seat_number,sa.name AS seat_name FROM tickets tic LEFT OUTER JOIN games g ON tic.game_id = g.id LEFT OUTER JOIN game_times gtimes ON g.id = gtimes.game_id LEFT OUTER JOIN game_team gteam ON g.id = gteam.game_id LEFT OUTER JOIN teams t ON gteam.team_id = t.id LEFT OUTER JOIN tournament tou ON t.tournament_id = tou.id LEFT OUTER JOIN seat_number sn ON tic.seat_number_id = sn.id LEFT OUTER JOIN seat_areas sa ON sn.seat_area_id = sa.id;');
        return view('admin.dashboard', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
