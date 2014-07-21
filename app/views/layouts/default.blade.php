<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yuuki Takezawa and LaravelJp contributors">
    <meta name="description" content="PHPフレームワーク Laravelのレシピサイト">
    <meta name="keywords" content="Laravel, framework, php, ララベル, 日本語" />
    <title>@yield('title', 'Laravel Recipes日本語版')</title>
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
@include('elements.navigation')
@include('elements.header')
<div class="container">
    @yield('content')
    @include('elements.disqus')
</div>
@include('elements.footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/react/0.11.0/react.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/react/0.11.0/JSXTransformer.js"></script>
<script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@yield('scripts')
<script>
/** GA **/
</script>
</body>
</html>