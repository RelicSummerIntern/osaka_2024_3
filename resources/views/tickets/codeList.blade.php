

@extends('layouts.app')

@section('content')
<div id="code-show">
    @if (session('status'))
        <h1>{{ session('status') }}</h1>
    @endif
    @foreach($orders as $order)
    <div class="code-list">
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
        <a href="{{route('tickets.show_code',['order_number'=>$order->order_number])}}">QRコードを表示する</a>
    </div>
    @endforeach

    <button class="button" onclick="window.location.href='/'">TOPへ</button>
</div>

@endsection
