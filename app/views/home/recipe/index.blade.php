@extends('layouts.default')
@section('styles')
<link href="/css/dist/highlight/styles/monokai.css" rel="stylesheet" />
@stop
@section('scripts')
<script src="/js/dist/highlight/highlight.pack.js"></script>
<script src="/js/application.js"></script>
@stop
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading recipe-header">
                <h2>
        	        <img src="/images/logos/laravel_jp.png" width="45px" height="45px">{{$recipe->title}}
        	    </h2>
        	</div>
       	    <div class="panel-body recipe-body">
                <h2>
                    <span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;悩み事
                </h2>
                {{Markdown::render($recipe->problem)}}
                <h2>
                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;解決方法
                </h2>
                {{Markdown::render($recipe->solution)}}
                <h2>
                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;アドバイス
                </h2>
                {{Markdown::render($recipe->discussion)}}
        	</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        @include('elements.sidebar')
    </div>
</div>
@stop