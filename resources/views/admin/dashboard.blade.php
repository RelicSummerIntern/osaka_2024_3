@extends('layouts.app')

@section('content')
<div id="dashboard" class="data-table">
    <table>
      <thead>
        <tr>
          <th>退場</th>
          <th>id</th>
          <th>日付</th>
          <th>一塁側</th>
          <th>三塁側</th>
          <th>予定開始時間</th>
          <th>予定終了時間</th>
          <th>実際の開始時間</th>
          <th>実際の終了時間</th>
        </tr>
      </thead>
      <tbody>
        @foreach($games as $game)
        <tr>
            <th><input type="radio"></th>
            <td>{{$game->id}}</td>
            <td>{{date('Y-m-d', strtotime($game->date))}}</td>
            @foreach($teams as $team)
            @if($game->id == $team->id)
            <td>{{$team->team_name}}</td>
            @endif
            @endforeach
            <td>{{date('H:i:s', strtotime($game->scheduled_start_time))}}</td>
            <td>{{date('H:i:s', strtotime($game->scheduled_end_time))}}</td>
            <td>{{date('H:i:s', strtotime($game->actual_start_time))}}</td>
            <td>{{date('H:i:s', strtotime($game->actual_end_time))}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
        @csrf
        <table>
            <tr>
                <th>id</th>
                <th>実際の開始時間</th>
                <th>実際の終了時間</th>
                <th>登録</th>
            </tr>
        @foreach($games as $game)
            <tr>
                <form action="{{ route('gameTimes.update',['id'=>$game->id])}}">
                <td>{{ $game -> id }}</td>
                <td>
                    <input type="time" name="actual_start_time" value="{{ $game->actual_start_time ? date('H:i', strtotime($game->actual_start_time)) : '' }}">
                </td>
                <td>
                    <input type="time" name="actual_end_time" value="{{ $game->actual_end_time ? date('H:i', strtotime($game->actual_end_time)) : '' }}">
                </td>
                <td><button type="submit">登録</button></td>
                </form>
            </tr>
        @endforeach
        </table>
        <table>
            <tr>
                <th>ゲームID</th>
                <th>購入番号</th>
                <th>入場日時</th>
                <th>退場日時</th>
                <th>登録</th>
            </tr>
            @foreach($buyers as $buyer)
            <form action="{{ route('enter.update',['buyer_id'=>$buyer->buyer_id])}}">
            <tr>
                    <td>{{ $buyer->id }}</td>
                    <td>{{ $buyer->order_number }}</td>
                    <td><input type="time" name="enter_time" value="{{ $buyer->enter_time ? date('H:i', strtotime($buyer->enter_time)) : '' }}"></td>
                    <td><input type="time" name="exit_time" value="{{ $buyer->exit_time ? date('H:i', strtotime($buyer->exit_time)) : '' }}"></td>
                    <td><button type="submit">登録</button></td>
            </tr>
            </form>
            @endforeach
        </table>
</div>
@endsection
