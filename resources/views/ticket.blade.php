@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="../../resources/sass/ticket.scss">

    <h1>枚数を選択してください</h1>
    <p>2024/8/20(火) 11:00開園10:30開場</p>
    <p>※試合終了３０分後から料金がかかります</p>
    <p>会場：甲子園球場</p>
    <p class="size"><b>中央指定席</b></p>
    <div class="adult-side">
    <label for="adult-ticket-number">
        大人（中学生以上）<br>￥１０００円
    </label>
    <div class="drop-adult">
    <select name="adult" id="adult-ticket-number">
        <option value="0">枚数</option>  
        <option value="1">1</option>
        <!-- <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option> -->
    </select>
    </div>
    </div>


    <div class="kids-side">
    <label for="kids-ticket-number">
        小人<br>￥５００円
    </label>
    <div class="drop-kids">
    <select name="kids" id="kids-ticket-number">
        <option value="0">枚数</option>    
        <option value="1">1</option>
        <!-- <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option> -->
    </select>
    </div>    
    </div>
    <div class="payment-button">
    <button >決済情報の入力</button>
    </div>

<p class="phone-number">チケットに関するお問い合わせ：０１０１－９２４－６２５</p>



    @endsection