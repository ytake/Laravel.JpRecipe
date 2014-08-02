<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="robots" content="index">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="">
    <meta property="og:type" content="article">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <meta name="twitter:card" value="summary"/>
    <meta name="twitter:site" value=""/>
    <meta name="twitter:creator" value=""/>
    <meta name="twitter:url" value=""/>
    <meta name="twitter:title" value=""/>
    <meta name="twitter:description" value=""/>
    <meta name="twitter:image" value=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yuuki Takezawa and LaravelJp contributors">
    <meta name="description" content="PHPフレームワーク Laravelの実装事例等を詳細に記述した情報を掲載したレシピサイトです。">
    <meta name="keywords" content="Laravel, framework, php, ララベル, フレームワーク, 日本語, チュートリアル, サンプル" />
    <title>@yield('title', 'Laravel Recipes日本語版')</title>
    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
    <link rel="dns-prefetch" href="//code.jquery.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//connect.facebook.net">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//disqus.com">
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/icon/favicon.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/dist/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/dist/animate.css" rel="stylesheet" type="text/css">
    <link href="/css/dist/main.css" rel="stylesheet" type="text/css">
    <link href="/css/dist/flaticon/flaticon.css" rel="stylesheet" type="text/css" >
    <!--[if lt IE 9]>
    <script src="/js/dist/html5shiv.js"></script>
    <script src="/js/dist/respond.min.js"></script>
    <![endif]-->
    <link href="/css/default.css" rel="stylesheet" type="text/css">
    @yield('styles')
</head>
<body>
@include('elements.header')
@yield('content')
@include('elements.footer')
<script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/react/0.11.0/react.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/react/0.11.0/JSXTransformer.js"></script>
@yield('scripts')
<script>
/** GA **/
</script>
</body>
</html>