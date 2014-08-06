<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', Config::get('recipe.title') . ' | webmaster')</title>
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet" />
    <link href="/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    @yield('styles')
</head>
<body>
<div id="wrapper">
    @include('elements.webmaster.header')
    @include('elements.webmaster.sidebar')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
            <hr />
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>