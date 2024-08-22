

@extends('layouts.app')

@section('content')

    @if (session('status'))
        <h1>{{ session('status') }}</h1>
    @endif
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
    <p><b>
    @php
        $date_work = "";
        $game_id_work = "";
        $seat_number_id_work = "";
        $seat_area_id_work = "";
        $actual_end_time_work = "";
        foreach($next as $row){
            $actualEndTime = new DateTime($actual_end_time_work);
            $currentTime = new DateTime('now');
            if($date_work == $row->date && $game_id_work + 1 == $row->game_id && $seat_number_id_work = $row->seat_number_id &&         $seat_area_id_work = $row->seat_area_id){
                if(!empty($actualEndTime) && $actualEndTime < $currentTime && empty($exit_time_work) && !empty($row->enter_time)){
                    echo "次の試合の人が来ました。速やかに退出してください。";
                }

            }else{
                $date_work = $row->date;
                $game_id_work = $row->game_id;
                $actual_end_time_work = $row->actual_end_time;
                $exit_time_work = $row->exit_time;
                $seat_number_id_work = $row->seat_number_id;
                $seat_area_id_work = $row->seat_area_id;
            }
        }
    @endphp</b></p>
    <p>入退場する際は上記のQRコードを読み取りしてください</p>
    @endforeach

    <button class="button" onclick="window.location.href='/'">TOPへ</button>

@endsection
