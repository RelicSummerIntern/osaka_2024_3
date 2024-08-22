@extends('layouts.app')

@section('content')
    <div class="image-and-info">
        <div class="image-box">
            <img src="image/img_24fc77a70077388fffb1304d6f511763255381.jpg" alt="top" class="image-item"/>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="info-box">
            <h1 class="info-title">見たい試合を見ることが出来る</h1>
            <p class="info-description">relicketで簡単購入</p>
            <h1 class="info-subtitle">試合終了30分後料金が発生いたします（100円/10分）</h1>
        </div>
    </div>

    <div class="games-list-section">
        <div class="games-header">
            <h1 class="header-title">本日の試合</h1>
            <p class="header-status">発売中◎　残り僅か△　売り切れ×</p>
        </div>

        <div class="games-items">
            <!-- 動的に試合情報を表示 -->

            <div onclick="window.location.href='{{ route('seat-select') }}'" class="game-item">
                <p class="game-title" >A高校 VS B高校</p>
                <p class="game-status">◎</p>
            </div>
            <div onclick="window.location.href='{{ route('seat-select') }}'" class="game-item">
                <p class="game-title">C高校 VS D高校</p>
                <p class="game-status">△</p>
            </div>
            <div onclick="window.location.href='{{ route('seat-select') }}'" class="game-item">
                <p class="game-title">E高校 VS F高校</p>
                <p class="game-status">△</p>

            @foreach($games as $game)
            <div class="game-item">
                <p class="game-title">
                    @php
                    $btw = "vs";
                    @endphp
                    @foreach($teams as $team)
                    @if($game->id == $team->id)
                    {{$team->team_name . $btw}}
                    @php
                    $btw = "";
                    @endphp
                    @endif
                    @endforeach
                </p>
                @php
                    $sold_count = 0;
                    $selling_count = 0;
                @endphp
                @foreach($sold as $row)
                @if($game->id == $row->id)
                    @php
                    if(empty($row->sold_num)){
                        $sold_count = 0;
                    }else{
                        $sold_count = $row->sold_num;
                    }
                    @endphp
                @endif
                @endforeach
                @foreach($selling as $row)
                @if($game->id == $row->id)
                    @php
                    $selling_count = $row->selling_num;
                    @endphp
                @endif
                @endforeach
                @php
                if ($sold_count > 0 && $selling_count > 0) {
                    $count = $sold_count / $selling_count;
                } else {
                    $count = 0; // $selling_count が 0 の場合の処理
                }
                if($count > 1){
                    $icon = "×";
                }elseif ($count > 0.6) {
                    $icon = "△";
                }else{
                    $icon = "◎";
                };
                @endphp
                <p class="game-status"><a href="{{ route( 'tickets.show',['id'=>$game->id] )}}">{{ $icon }}</a></p>
            </div>
            @endforeach

        <button class="next-day-button">翌日へ</button>

    </div>

    <div class="purchase-options">
        @foreach($games as $game)
        <div class="purchase-card">
            <img src="image/dome-890x500.jpg" alt="Game1" class="purchase-image"/>
            <p class="purchase-title">
                @php
                $btw = "vs";
                @endphp
                @foreach($teams as $team)
                @if($game->id == $team->id)
                {{$team->team_name . $btw}}
                @php
                $btw = "";
                @endphp
                @endif
                @endforeach
            </p>
            @php
                $sold_count = 0;
                $selling_count = 0;
            @endphp
            @foreach($sold as $row)
            @if($game->id == $row->id)
                @php
                if(empty($row->sold_num)){
                    $sold_count = 0;
                }else{
                    $sold_count = $row->sold_num;
                }
                @endphp
            @endif
            @endforeach
            @foreach($selling as $row)
            @if($game->id == $row->id)
                @php
                $selling_count = $row->selling_num;
                @endphp
            @endif
            @endforeach
            @php
            if ($sold_count > 0 && $selling_count > 0) {
                $count = $sold_count / $selling_count;
            } else {
                $count = 100; // $selling_count が 0 の場合の処理
            }
            if($count > 80){
                $icon = "◎";
            }elseif ($count > 40) {
                $icon = "△";
            }else{
                $icon = "×";
            };
            @endphp

            <p><a href="{{ route( 'tickets.show',['id'=>$game->id] )}}">{{ $icon }}</a></p>
        </div>
        @endforeach

        <button class="next-day-button">翌日へ</button>

    </div>

    <div class="purchase-options">
        <div class="purchase-card">
            <img src="image/dome-890x500.jpg" alt="Game1" class="purchase-image"/>
            <p class="purchase-title">A高校 VS B高校</p>
            <p class="purchase-status">◎空席あり</p>
            <button class="purchase-button" onclick="window.location.href='{{ route('seat-select') }}'">購入する</button>
        </div>
        <div class="purchase-card">
            <img src="image/dome-890x500.jpg" alt="Game2" class="purchase-image"/>
            <p class="purchase-title">C高校 VS D高校</p>
            <p class="purchase-status">△残り僅か</p>
            <button class="purchase-button" onclick="window.location.href='{{ route('seat-select') }}'">購入する</button>
        </div>
        
        <div class="purchase-card">
            <img src="image/dome-890x500.jpg" alt="Game3" class="purchase-image"/>
            <p class="purchase-title">E高校 VS F高校</p>
            <p class="purchase-status">×売り切れ</p>
            <button class="purchase-button" onclick="window.location.href='{{ route('seat-select') }}'">購入する</button>

            <p class="purchase-status"><a href="{{ route( 'tickets.show',['id'=>$game->id] )}}">{{ $icon }}</a></p>
            <button class="purchase-button">購入する</button>
        </div>
        @endforeach
    </div>

    <div class="customer-info">
        <h1 class="customer-info-title">お客様へのご案内</h1>
        <p class="customer-info-text">試合終了後、スムーズな会場運営にご協力をお願いいたします。退出に関する重要事項は以下の通りです<div class=""></div></p>
        <p class="customer-info-text">試合終了後30分間は無料でお過ごしいただけます。30分を超過した場合、10分ごとに100円の延長料金が発生いたします。</p>
        <p class="customer-info-text">お時間に余裕を持ってのご退場にご協力いただけますと幸いです。ご理解とご協力をお願い申し上げます。</p>
    </div>
@endsection
