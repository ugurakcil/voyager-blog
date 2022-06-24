<!doctype html>
<html lang="{{\Illuminate\Support\Facades\App::getLocale()}}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://www.2gethersocial.com.tr/frontend/img/favicons/favicon.png" type="image/png" />
    @include("voger::blog.includes.head-tags")
    @yield('styles')

    @hasSection('title')
        @hasSection('beforeTitle')
            <title>{{ setting(app()->getLocale().'.title') }} - @yield("title")</title>
        @else
            <title>@yield("title") - {{ setting(app()->getLocale().'.title') }}</title>
        @endif
    @else
        <title>{{ setting(app()->getLocale().'.title') }}</title>
    @endif

    @hasSection('meta_description')
        <meta name="description" content="@yield('meta_description')">
    @endif
</head>
<body>
@include("voger::blog.includes.navbar")
@yield("breadcrumbs")
@yield("content")
@include("voger::blog.includes.footer")
@include("voger::blog.includes.fixed-sections")
@include("voger::blog.includes.foot-tags")

</body>

@yield('scripts')
</html>
