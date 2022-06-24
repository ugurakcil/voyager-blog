@extends("voger::blog.layouts.master")

@section("title", empty($page->seo_title) ? $page->title : $page->seo_title)
@section("meta_description", $page->meta_description)

@section("content")
  <!-- Page Content -->
  <div class="container full-container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-10 offset-md-1">

        <!-- Blog Post -->
        <div class="big-card page-card card mb-4">
          <a href="#" title="{{$page->title}}">
             <img class="card-img-top" src="{{asset('storage/'.$page->image)}}" alt="{{$page->title}}">
          </a>
          <div class="card-body">
            <h1 class="card-title">
                {{Str::upper($page->title)}}
            </h1>
            <div class="card-date">
                {{ localizedDate($page->created_at, '%d %B %Y %A')}}
            </div>

            <div class="card-tags">
                {{Str::upper(__('voger::generic.tags'))}} :
                @foreach($page->tags as $postTag)
                <a href="{{route('voger.blog.tag', ['slug' => $postTag->getTranslatedAttribute('slug')])}}" title="{{$postTag->getTranslatedAttribute('name')}}">
                    #{{Str::upper($postTag->getTranslatedAttribute('name'))}}
                </a>
                @endforeach
            </div>

            <div class="mini-line"></div>

            <div class="card-text">
                <span class="card-excerpt">{{$page->excerpt}}</span>
                {!!$page->body!!}
            </div>

            <div class="mini-line"></div>

            <div class="share-box">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="share-box-text">
                            {{__('voger::generic.share')}} &rarr;
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="share-box-links">
                            <div class="social-effect jaques">
                                <div class="buttons">
                                    <a href="javascript:void()" class="fb" title="Share on Facebook" data-sharer="facebook"
                                        data-title="{{$page->title}}"
                                        data-hashtags="{{$page->category->getTranslatedAttribute('name')}}"
                                        data-url="{{url()->current()}}">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void()" class="tw" title="Share on twitter" data-sharer="twitter"
                                        data-title="{{$page->title}}"
                                        data-hashtags="{{$page->category->getTranslatedAttribute('name')}}"
                                        data-url="{{url()->current()}}">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void()" class="whatsapp" title="Share on whatsapp" data-sharer="whatsapp"
                                        data-title="{{$page->title}}"
                                        data-hashtags="{{$page->category->getTranslatedAttribute('name')}}"
                                        data-url="{{url()->current()}}">
                                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void()" class="dribbble" title="Share on Dribbble" data-sharer="dribbble"
                                        data-title="{{$page->title}}"
                                        data-hashtags="{{$page->category->getTranslatedAttribute('name')}}"
                                        data-url="{{url()->current()}}">
                                        <i class="fab fa-dribbble" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void()" class="vimeo" title="Share on vimeo" data-sharer="vimeo"
                                        data-title="{{$page->title}}"
                                        data-hashtags="{{$page->category->getTranslatedAttribute('name')}}"
                                        data-url="{{url()->current()}}">
                                        <i class="fab fa-vimeo-v" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void()" class="pinterest" title="Share on pinterest" data-sharer="pinterest"
                                        data-title="{{$page->title}}"
                                        data-hashtags="{{$page->category->getTranslatedAttribute('name')}}"
                                        data-url="{{url()->current()}}">
                                        <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void()" class="in" title="Share on linkedin" data-sharer="linkedin"
                                        data-title="{{$page->title}}"
                                        data-hashtags="{{$page->category->getTranslatedAttribute('name')}}"
                                        data-url="{{url()->current()}}">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="card-header">{{__('voger::generic.popular_blog_posts')}}</h5>

            <div class="card-post-list row my-5">
                @foreach($blogPopulars->chunk(ceil(count($blogPopulars)/2)) as $blugPopularsChunked)
                    <div class="col-sm-6">
                    @foreach($blugPopularsChunked as $post)

                    <div class="card-post-row mb-5">
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
                @endforeach
            </div>

            <div class="mini-line"></div>

          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
@endsection
