@extends('layouts.app')

@section('content')
<div class="container">
        <h1>クレジットカード情報</h1>
        <form action="#" method="post">
            <div class="form-group">
                <label for="card-number">カード番号</label>
                <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9123 4567" required>
            </div>
            <div class="form-group">
                <label for="card-name">カード名義</label>
                <input type="text" id="card-name" name="card-name" placeholder="山田 太郎" required>
            </div>
            <div class="form-group">
                <label for="expiry-date">有効期限</label>
                <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123" required>
            </div>
            <button type="submit">送信</button>
        </form>
    </div>   
@endsection