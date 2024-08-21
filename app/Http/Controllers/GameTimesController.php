<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameTimes;


class GameTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $member=GameTimes::find($id);

        $member->actual_start_time=$request->input('actual_start_time');
        $member->actual_end_time=$request->input('actual_end_time');

        //DBに保存
        $member->save();

        //処理が終わったらmember/indexにリダイレクト
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
