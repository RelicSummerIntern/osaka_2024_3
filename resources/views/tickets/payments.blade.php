@extends('layouts.app')

@section('content')
<div id="payments">
    <div>
        <p>利用は終了しています。</p>
        <p>支払い金額額: ¥{{ $data[0]->payment }}</p>
        <p>ご利用ありがとうございました。</p>
    </div>
</div>
@endsection
