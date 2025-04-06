<div class="row">
    <h3>{{$title}}</h3>
</div>
<div class="row">
    <span>{{$username}}</span>
</div>
<div class="row">
    <span>{{$date}}</span>
</div>
<a class="btn btn-primary" href="{{route('discussion.show',['discussion' => $slug])}}">Обсудить</a>

