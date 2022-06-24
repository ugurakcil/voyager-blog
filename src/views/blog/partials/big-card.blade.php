<!-- Blog Post -->
<div class="big-card card mb-4">
    <a href="{{route('voger.blog.post', ['slug' => $post->slug])}}" title="{{$post->title}}">
       <img class="card-img-top" src="{{asset('storage/'.$post->image)}}" alt="{{$post->title}}">
    </a>
    <div class="card-body">
      <div class="card-tags">
          @foreach($post->tags as $postTag)
            <a href="{{route('voger.blog.tag', ['slug' => $postTag->getTranslatedAttribute('slug')])}}" title="{{$postTag->getTranslatedAttribute('name')}}">
                #{{$postTag->getTranslatedAttribute('name')}}
            </a>
          @endforeach
      </div>
      <h2 class="card-title">
          <a href="{{route('voger.blog.post', ['slug' => $post->slug])}}" title="{{$post->title}}">
              {{$post->title}}
          </a>
      </h2>
      <div class="card-date">
          {{ localizedDate($post->created_at, '%d %B %Y %A')}}
      </div>
      <p class="card-text">
          {{$post->excerpt}}
          <span class="card-more"><a href="{{route('voger.blog.post', ['slug' => $post->slug])}}" title="{{$post->title}}">&rarr;</a></a>
      </p>
    </div>
</div>
