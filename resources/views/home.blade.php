@extends('layouts.app')

@section('content')
<div class="image">
    <img src="{{ asset('image/img_24fc77a70077388fffb1304d6f511763255381.avif')}}" alt="top"/>
</div>
<div>
    <h1 class="info">見たい試合を見ることが出来る</h1>
    <p>relicketで簡単購入</p>
    <h1>試合終了30分後料金が発生いたします（100円/10分）</h1>
</div>
<div>
    <div>
    <h1>本日の試合</h1>
    <p>発売中◎　残り僅か△　売り切れ×</p>
    </div>
    <div>
        <p>A高校 VS B高校</p>
        <p>◎</p>
    </div>
    <div>
        <p>C高校 VS D高校</p>
        <p>△</p>
    </div>
    <div>
        <p>E高校 VS F高校</p>
        <p>×</p>
    </div>
    <button>翌日へ</button>
</div>
<div>
    <div>
        <img src="resources/views/screen/image" alt="Game1"/>
        <p>A高校 VS B高校</p>
        <p>空席あり◎</p>
        <button>購入する</button>
    </div>
    <div>
        <img src="resources/views/screen/image" alt="Game2"/>
        <p>C高校 VS D高校</p>
        <p>△</p>
        <button>購入する</button>
    </div>
    <div>
        <img src="resources/views/screen/image" alt="Game2"/>
        <p>E高校 VS F高校</p>
        <p>×</p>
        <button>購入する</button>
    </div>
</div>
<div>
    <h1>お客様へのご案内</h1>
    <p> 試合終了後、スムーズな会場運営にご協力をお願いいたします。</p>
    <p>退出に関する重要事項は以下の通りです</p>
    <p>試合終了後30分間は無料でお過ごしいただけます。
        30分を超過した場合、10分ごとに100円の延長料金が発生いたします。
        お時間に余裕を持ってのご退場にご協力いただけますと幸いです。ご理解とご協力をお願い申し上げます。</p>
</div>
@endsection

