
    <!-- Populars -->
    <div class="card">
    <h5 class="card-header">{{__('voger::generic.popular_blog_posts')}}</h5>
    <div class="card-body">
        <div class="card-post-list">
            @foreach($blogPopulars as $post)

            <div class="card-post-row my-2">
                <div class="card-post-image">
                    <a href="{{route('voger.blog.post', ['slug' => $post->slug])}}" title="">
                        <img src="{{ asset('storage/' . afterImageName($post->image, 'cropped') ) }}" alt="" class="mw-100">
                    </a>
                </div>
                <div class="card-post-content">
                    <div class="card-post-tags">
                        <a href="{{route('voger.blog.category', ['slug' => $post->category->getTranslatedAttribute('slug')])}}" title="">{{$post->category->getTranslatedAttribute('name')}}</a>
                    </div>
                    <h4 class="card-post-title">
                        <a href="{{route('voger.blog.post', ['slug' => $post->slug])}}" title="{{$post->title}}">{{$post->title}}</a>
                    </h4>
                    <div class="card-post-date">
                        {{ localizedDate($post->created_at, '%d %B %Y')}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Tags Widget -->
    <div class="card my-5">
        <h5 class="card-header">{{__('voger::generic.tags_mini')}}</h5>
        <div class="card-body">
            <ul class="list-beside">
                @foreach($blogTags as $tag)
                <li>
                    <a href="{{route('voger.blog.tag', ['slug' => $tag->slug])}}" title="{{$tag->name}}">{{$tag->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Search box -->
    <div class="card my-5">
        <h5 class="card-header">{{__('voger::generic.search')}}</h5>
        <div class="card-body">
            <form action="{{route('voger.blog.search')}}" method="GET">
                <div class="input-group search-box">
                    <input type="text" name="search" class="form-control" placeholder="{{__('voger::generic.write_a_search_word')}}" value="{{request()->get('search')}}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <!--
    <div class="card my-5">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>
    -->
