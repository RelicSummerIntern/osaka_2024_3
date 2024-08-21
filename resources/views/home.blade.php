@extends('layouts.app')

@section('content')

    <div class="image">
        <img src="image/img_24fc77a70077388fffb1304d6f511763255381.jpg" alt="top"/>
    </div>

    <div class="info-section">
        <h1 class="info">見たい試合を見ることが出来る</h1>
        <p>relicketで簡単購入</p>
        <h1>試合終了30分後料金が発生いたします（100円/10分）</h1>
    </div>

    <div class="games-section">
        <div class="today-games-header">
            <h1>本日の試合</h1>
            <p>発売中◎　残り僅か△　売り切れ×</p>
        </div>
<<<<<<< HEAD

        <div class="games-list">
            <!-- 動的に試合情報を表示 -->
            <div class="game">
                <p>A高校 VS B高校</p>
                <p>◎</p>
            </div>
            <div class="game">
                <p>C高校 VS D高校</p>
                <p>△</p>
            </div>
            <div class="game">
                <p>E高校 VS F高校</p>
                <p>△</p>
            </div>
=======
        @foreach($games as $game)
        <div>
            <p>
                <?php $btw = "vs"; ?>
                @foreach($teams as $team)
                @if($game->id == $team->id)
                {{$team->team_name . $btw}}
                <?php $btw = ""; ?>
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
>>>>>>> 9f2b9af1edefbf94beb3a26813289efb9fa54096
        </div>
        <button>翌日へ</button>
    </div>

    <div class="purchase-section">
        <div class="game-card">
            <img src="image/dome-890x500.jpg" alt="Game1"/>
            <p>A高校 VS B高校</p>
            <p>空席あり◎</p>
            <button>購入する</button>
        </div>
        <div class="game-card">
            <img src="image/dome-890x500.jpg" alt="Game2"/>
            <p>C高校 VS D高校</p>
            <p>△</p>
            <button>購入する</button>
        </div>
        <div class="game-card">
            <img src="image/dome-890x500.jpg" alt="Game3"/>
            <p>E高校 VS F高校</p>
            <p>×</p>
            <button>購入する</button>
        </div>
    </div>

    <div class="info-section">
        <h1>お客様へのご案内</h1>
        <p>試合終了後、スムーズな会場運営にご協力をお願いいたします。</p>
        <p>退出に関する重要事項は以下の通りです</p>
        <p>試合終了後30分間は無料でお過ごしいただけます。30分を超過した場合、10分ごとに100円の延長料金が発生いたします。お時間に余裕を持ってのご退場にご協力いただけますと幸いです。ご理解とご協力をお願い申し上げます。</p>
    </div>

@endsection

