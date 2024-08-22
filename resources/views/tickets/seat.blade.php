@extends('layouts.app')

@section('content')
<div>
    @foreach($seats as $seat)
    @if(empty($seat->buyer_id))
    <p><a href="{{ route('tickets.create',['seat_number_id'=>$seat->seat_id,'game_id'=>$seat->id])}}">{{$seat->seat_name}}:〇</a></p>
    @else
    <p>{{$seat->seat_name}}:×</a></p>
    @endif
    @endforeach
</div>
@endsection
