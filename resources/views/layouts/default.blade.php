<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="robots" content="index">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="fb:app_id" content="{{config('recipe.facebook_app_id')}}">
    <meta property="og:title" content="@yield('title', config('recipe.title'))">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:image" content="{{asset('images/logos/laravel-slant.png')}}">
    <meta property="og:description" content="@yield('description', config('recipe.description'))">
    <meta name="twitter:card" value="summary"/>
    <meta name="twitter:site" value=""/>
    <meta name="twitter:creator" value="@ex_takezawa"/>
    <meta name="twitter:url" value="{{Request::url()}}"/>
    <meta name="twitter:title" value="@yield('title', config('recipe.title'))"/>
    <meta name="twitter:description" value="@yield('description', config('recipe.description'))"/>
    <meta name="twitter:image" value="{{asset('images/logos/laravel-slant.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yuuki Takezawa and LaravelJp contributors">
    <meta name="description" content="@yield('description', config('recipe.description'))">
    <meta name="keywords" content="@yield('keywords', config('recipe.keywords'))" />
    <title>@yield('title', config('recipe.title'))</title>
    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
    <link rel="dns-prefetch" href="//code.jquery.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//connect.facebook.net">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/icon/favicon.png">
    <!--
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/theme.css" rel="stylesheet">
    // -->
    <link href="/assets/css/materialize.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
<!-- Navbar goes here -->
@include('elements.header')
<main class="grey lighten-4">
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</main>
@include('elements.footer')
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/materialize.min.js"></script>
<script src="/js/application.js"></script>
@yield('scripts')
<div id="fb-root"></div>
<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '{{Config::get('recipe.ga')}}', 'auto');
    ga('send', 'pageview');
(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId={{Config::get('recipe.facebook_app_id')}}&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<script type="text/javascript">
    window.___gcfg = {lang: 'ja'};
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>
</body>
</html>
