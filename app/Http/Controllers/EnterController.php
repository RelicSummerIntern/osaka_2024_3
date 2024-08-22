<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enters;

class EnterController extends Controller
{

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $buyer_id)
    {
        $enter = Enters::where('buyer_id', $buyer_id)->first();

        $enter->enter_time=$request->input('enter_time');
        $enter->exit_time=$request->input('exit_time');

        //DBに保存
        $enter->save();

        //処理が終わったらmember/indexにリダイレクト
        return redirect('admin');
    }
}
