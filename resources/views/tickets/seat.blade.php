@extends('layouts.app')

@section('content')
<div>
    @foreach($seats as $seat)
    <p><a href="{{ route('tickets.create',['seat_number_id'=>$seat->seat_id,'game_id'=>$seat->id])}}">{{$seat->seat_name}}</a></p>
    @endforeach
</div>
@endsection
