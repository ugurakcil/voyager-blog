<!-- Navigation -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
            <div class="collapse-inside">
                <div class="topline">
                    <ul class="top-socials">
                        @if(setting('site.facebook'))
                        <li><a href="{{ setting('site.facebook') }}" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        @endif

                        @if(setting('site.twitter'))
                        <li><a href="{{ setting('site.twitter') }}" title="twitter"><i class="fab fa-twitter"></i></a></li>
                        @endif

                        @if(setting('site.pinterest'))
                        <li><a href="{{ setting('site.pinterest') }}" title="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                        @endif

                        @if(setting('site.instagram'))
                        <li><a href="{{ setting('site.instagram') }}" title="instagram"><i class="fab fa-instagram"></i></a></li>
                        @endif

                        @if(setting('site.vimeo'))
                        <li><a href="{{ setting('site.vimeo') }}" title="vimeo"><i class="fab fa-vimeo-v"></i></a></li>
                        @endif

                        @if(setting('site.youtube'))
                        <li><a href="{{ setting('site.youtube') }}" title="youtube"><i class="fab fa-youtube"></i></a></li>
                        @endif

                        @if(setting('site.linkedin'))
                        <li><a href="{{ setting('site.linkedin') }}" title="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item hide-in-mobile active">
                            <a class="nav-link text-uppercase" href="{{route('voger.blog.home')}}" title="{{ setting(app()->getLocale().'.seo_title') }}">
                                {{__('voger::generic.blog')}}
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item hide-in-mobile">
                            <a class="nav-link text-uppercase" href="{{ setting(app()->getLocale().'.official_site') }}" title="{{Str::title(__('voger::generic.go_to_website'))}}">{{__('voger::generic.go_to_website')}}</a>
                        </li>
                        <li class="nav-item hide-in-mobile">
                            <a class="nav-link text-uppercase" href="{{ setting(app()->getLocale().'.contact_address') }}" title="{{Str::title(__('voger::generic.contact'))}}">{{__('voger::generic.contact')}}</a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group btn-language">

                                <button type="button" class="btn dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-language" aria-hidden="true"></i> {{mb_strtoupper(config('app.locale_names.'.\Illuminate\Support\Facades\App::getLocale()))}}
                                </button>

                                <div class="dropdown-menu dropdown-menu-right">
                                @foreach (config('app.available_locales') as $locale => $localeUrl)
                                    @if (\Illuminate\Support\Facades\App::getLocale() != $locale)
                                        <a href="{{route('voger.setLocale', ['locale' => $locale])}}" class="dropdown-item" title="{{$locale}}">{{mb_strtoupper(config('app.locale_names.'.$locale))}}</a>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="top-logo">
                    <a href="{{route('voger.blog.home')}}" title="{{ setting(app()->getLocale().'.seo_title') }}">
                        <img src="{{asset('storage/'.setting('site.logo'))}}" alt="{{ setting(app()->getLocale().'.title') }}" class="mw-100">
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <div class="top-menu">
                        <ul class="top-menu-list">
                            @foreach ($blogCategories as $category)
                            <li class="@if(isset($currentCategory) && $currentCategory->id == $category->id) active @endif">
                                <a href="{{ route('voger.blog.category', ['slug' => $category->slug]) }}"
                                    title="{{$category->name}}">
                                    {{Str::upper($category->name)}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!--./collapse navbar-collapse-->
            </div>
    </div>
  </nav>
