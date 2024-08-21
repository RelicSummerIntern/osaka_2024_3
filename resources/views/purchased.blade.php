

@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="./resources/sass/purchased.scss">
    <h1>チケットの購入が<br>完了しました</h1>
    <div class="img-center">
<!--(URL)の部分を変更するとそのQRコードができる-->
    <img class="QRimg" src="https://api.qrserver.com/v1/create-qr-code/?data=(URL)" alt="QRcode">
</div>
    <p>入場する際は上記のQRコードを読み取りしてください</p>

    <button class="button">TOPへ</button>

@endsection
