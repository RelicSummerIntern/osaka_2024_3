@extends('layouts.app')

@section('content')
<div id="payments">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div>
        @if (session('price'))
            <p>支払い額: ¥{{ session('price') }}</p>
        @endif
        <p>ご利用ありがとうございました。</p>
    </div>
</div>
@endsection
