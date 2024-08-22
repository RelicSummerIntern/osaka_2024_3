@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="../../resources/sass/ticket.scss">
    
    @foreach($tickets as $ticket)
        <h1>{{$ticket->tournament_name}}</h1>
        <p>{{date('Y年m月d日' , strtotime($ticket->date))}} {{date('H時i分' , strtotime($ticket->scheduled_start_time))}} 開始予定</p>
        <p>※試合終了３０分後から料金がかかります</p>
        <p>会場：甲子園球場</p>
        <p>{{$ticket->seat_name}}</p>
        <p>枚数を選択してください</p>
        
        <form action="{{ route('tickets.store', ['ticket_id' => $ticket->ticket_id]) }}" >
            @csrf
            <div class="adult-side">
                <label for="adult-ticket-number">
                    大人（中学生以上）<br>{{$ticket->price}}
                </label>
                <div class="drop-adult">
                    <select name="adult" id="adult-ticket-number">
                        <option value="1">1</option>
                        <!-- 他のオプションを追加する場合はここに追加 -->
                    </select>
                </div>
            </div>
            <div class="payment-button">
                <button type="submit">決済情報の入力</button>
            </div>
        </form>
    @endforeach

@endsection
