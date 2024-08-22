@extends('layouts.app')
@section('content')
<div class="layout-section">
    <div class="image-wrapper">
        <img class="seat-select-img" src="{{ asset('image/seat.jpg') }}" alt="top"/>
    </div>
    <div class="details-wrapper">
        <div class="seat-details">
        <div class="match-details">
            <p>第一試合</p>
            <h1>A高校対B高校</h1>
        </div>
            @foreach($seats as $seat)
            <div class="detail-line">
                @if(empty($seat->buyer_id))
                <p class="seat-link"><a href="{{ route('tickets.create',['seat_number_id'=>$seat->seat_id,'game_id'=>$seat->id])}}">{{$seat->seat_name}}:〇</a></p>
                @else
                <p>{{$seat->seat_name}}:×</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
