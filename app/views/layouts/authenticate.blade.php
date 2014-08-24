<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="robots" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yuuki Takezawa and LaravelJp contributors">
    <meta name="description" content="PHPフレームワーク Laravelの実装事例等を詳細に記述した情報を掲載したレシピサイトです。">
    <meta name="keywords" content="Laravel, framework, php, ララベル, フレームワーク, 日本語, チュートリアル, サンプル" />
    <title>@yield('title', Config::get('recipe.title'))</title>
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/icon/favicon.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
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
</body>
</html>