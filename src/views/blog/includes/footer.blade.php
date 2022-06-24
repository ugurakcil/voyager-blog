

  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
        <div class="footer-body">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{asset('storage/'.setting('site.logo'))}}" alt="footer logo" class="mw-100">
                </div>
                <div class="col-sm-2">
                    <ul class="footer-menu">
                        <li>
                            <a href="{{route('voger.blog.home')}}" title="{{ setting(app()->getLocale().'.seo_title') }}">
                                {{Str::title(__('voger::generic.blog'))}}
                            </a>
                        </li>
                        <li><a href="{{ setting(app()->getLocale().'.official_site') }}" title="{{Str::title(__('voger::generic.go_to_website'))}}">{{Str::title(__('voger::generic.go_to_website'))}}</a></li>
                        <li><a href="{{ setting(app()->getLocale().'.contact_address') }}" title="{{Str::title(__('voger::generic.contact'))}}">{{Str::title(__('voger::generic.contact'))}}</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="footer-menu">
                        @foreach ($blogCategories as $category)
                        <li class="@if(isset($currentCategory) && $currentCategory->id == $category->id) active @endif">
                            <a href="{{ route('voger.blog.category', ['slug' => $category->slug]) }}"
                                title="{{$category->name}}">
                                {{Str::title($category->name)}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-4 text-right">
                    <ul class="foo-socials">
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

                    @if(mb_strpos(setting('site.email'), '@') !== false)
                    @php
                    preg_match_all("/(.*)(@)(.*)(\.)(.*)$/", setting('site.email'), $emailParts);
                    @endphp
                    @endif

                    <script type="text/javascript">
                    function createMail(domain, tld, className, naam) {
                        var mail = '';
                        mail += '<a href="' + 'ma' + 'il' + 'to:' + naam;
                        mail += '@' + domain + '.' + tld;
                        mail += '" class="' + className + '" ';
                        mail += '>' + naam;
                        mail += '@' + domain;
                        mail += '.' + tld;
                        mail += '<' + '/a>';
                        document.write(mail);
                    }
                    createMail("{{$emailParts[3][0]}}", "{{$emailParts[5][0]}}", "footer-mail", '{{$emailParts[1][0]}}');
                    </script>
                </div>
            </div>
        </div>
        <div class="copyright m-0 text-left">{{setting(app()->getLocale().'.copyright')}}</div>
    </div>
    <!-- /.container -->
  </footer>
