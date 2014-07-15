<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <title>@yield('title', 'Laravel')</title>
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
@include('elements.header')
<div class="container">
    @yield('content')
</div>
@include('elements.footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/react/0.10.0/react.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/react/0.10.0/JSXTransformer.js"></script>
<script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
@yield('scripts')
</body>
</html>