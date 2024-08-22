

@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="./resources/sass/purchased.scss">
    <h1>チケットの購入が<br>完了しました</h1>
    @foreach($orders as $order)
    @php
    $btw = "vs";
    @endphp
    <p>@foreach($teams as $team)
    @if($order->game_id == $team->id)
    {{$team->team_name . $btw}}
    @php
    $btw = "";
    @endphp
    @endif
    @endforeach</p>
    <p>{{$order->seat_area_name}}</p>
    <p>{{$order->seat_number_name}}</p>
    <div class="img-center">
<!--(URL)の部分を変更するとそのQRコードができる-->
        <img class="QRimg" src="https://api.qrserver.com/v1/create-qr-code/?data={{$order->order_number}}" alt="QRcode">
    </div>
    <input type="hidden" value="{{$order->actual_end_time}}" id="end_time">
    <p>{{$order->actual_end_time}}</p>
    <div id="container">
      <div id="time">00:00:00.000</div>
    </div>
    <p>入退場する際は上記のQRコードを読み取りしてください</p>
    @endforeach

    <button class="button">TOPへ</button>

@endsection
