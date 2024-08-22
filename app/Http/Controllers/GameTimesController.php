<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameTimes;


class GameTimesController extends Controller
{

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
}
