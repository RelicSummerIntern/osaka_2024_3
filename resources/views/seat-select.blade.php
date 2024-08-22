@extends('layouts.app')
@section('content')
<div class="layout-section">
    <div class="image-wrapper">
        <img class="seat-select-img" src="image/seat.jpg" alt="top"/>
    </div>

    <div class="details-wrapper">
        <div class="match-details">
            <p>第一試合</p>
            <h1>A高校対B高校</h1>
        </div>
        <div class="seat-details">
            <a href="ticket.php?seat=central" class="seat-link">☆中央指定席</a>
            <a href="ticket.php?seat=first_base" class="seat-link">☆一塁指定席</a>
            <a href="ticket.php?seat=third_base" class="seat-link">☆三塁指定席</a>
            <a href="ticket.php?seat=first_base_alps" class="seat-link">☆一塁アルプス指定席</a>
            <a href="ticket.php?seat=third_base_alps" class="seat-link">☆三塁アルプス指定席</a>
            <a href="ticket.php?seat=right_field" class="seat-link">☆ライト外野指定席</a>
            <a href="ticket.php?seat=left_field" class="seat-link">☆レフト外野指定席</a>
        </div>
    </div>
</div>
@endsection
