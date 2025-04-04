<h2 class="article-title"><a href="{{route('article.show',['article'=>$slug])}}" {{$title}}></a></h2>
<h3 class="article-description">{{$description}}</h3>
<span class="article-date mb-3">{{$date}}</span>
@if(!empty($category))
    <span class="article-category">{{$category}}</span>
@endif
<hr>
