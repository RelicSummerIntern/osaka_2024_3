<form action="{{ route('gameTimes.update',['id'=>$games[0]->id])}}">
    @csrf
    <input type="time">
</form>
