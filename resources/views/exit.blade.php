@extends('layouts.app')

@section('content')



  <link rel='stylesheet' href='resources/sass/exit.scss'>

  <h1>試合が終了しました。<br>退出してください</h1>
  <div class="QRimg">
    <img src="https://api.qrserver.com/v1/create-qr-code/?data=(URL)" alt="QRcode">
  </div>
  <p class="text-1">※退場する際は上記のQRコードを読みこませてください</p>
  <p class="text-2">試合終了からの<br>経過時間</p>
  <div id="container">
    <div id="time">00:00:00.000</div>
    <!-- <div id="buttons">
      <input id="start" type="button" value="start">
      <input id="stop" type="button" value="stop">
      <input id="reset" type="button" value="reset">
    </div> -->
  </div>  


  <script src='../../js/exit.js'></script>

@endsection