<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="robots" content="index">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="@yield('title', Config::get('recipe.title'))">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:image" content="{{asset('images/logos/laravel-slant.png')}}">
    <meta property="og:description" content="@yield('description', Config::get('recipe.description'))">
    <meta name="twitter:card" value="summary"/>
    <meta name="twitter:site" value=""/>
    <meta name="twitter:creator" value="@ex_takezawa"/>
    <meta name="twitter:url" value="{{Request::url()}}"/>
    <meta name="twitter:title" value="@yield('title', Config::get('recipe.title'))"/>
    <meta name="twitter:description" value="@yield('description', Config::get('recipe.description'))"/>
    <meta name="twitter:image" value="{{asset('images/logos/laravel-slant.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yuuki Takezawa and LaravelJp contributors">
    <meta name="description" content="@yield('description', Config::get('recipe.description'))">
    <meta name="keywords" content="@yield('keywords', Config::get('recipe.keywords'))" />
    <title>@yield('title', Config::get('recipe.title'))</title>
    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
    <link rel="dns-prefetch" href="//code.jquery.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//connect.facebook.net">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//disqus.com">
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/icon/favicon.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="/js/dist/html5shiv.js"></script>
    <script src="/js/dist/respond.min.js"></script>
    <![endif]-->
    <link href="/css/theme.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
@include('elements.header')
<div class="container" id="main">
@yield('content')
</div>
@include('elements.footer')
<script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@yield('scripts')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '{{Config::get('recipe.ga')}}', 'auto');
    ga('send', 'pageview');
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId={{Config::get('recipe.facebook_app_id')}}&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
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