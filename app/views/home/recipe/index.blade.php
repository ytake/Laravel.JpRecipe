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
        	<hr class="recipe-header-line" />
       	    <div class="panel-body recipe-body">
                @foreach($tags as $tag)
                <span class="pull-right label label-laravel" title="{{$tag->tag_name}}-タグ">{{$tag->tag_name}}</span>
                @endforeach
                <h2>
                    <span class="glyphicon glyphicon-question-sign"></span>&nbsp;悩み事
                </h2>
                {{Markdown::render($recipe->problem)}}
                <h2>
                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;解決方法
                </h2>
                {{Markdown::render($recipe->solution)}}
                <h2>
                    <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;アドバイス
                </h2>
                {{Markdown::render($recipe->discussion)}}
                <hr />
                <small>{{Markdown::render($recipe->credit)}}</small>
        	</div>
        	<hr />
        	<div class="panel-body recipe-body">
        	@if(isset($info->prev))
        	<div style="float:left;">
        	    <a href="{{route('home.recipe', ['one' => $info->prev->recipe_id])}}" title="{{$info->prev->title}}" class="btn btn-danger">
        	        <<&nbsp;前のレシピ
        	    </a>
        	</div>
            @endif
        	@if(isset($info->next))
        	<div style="float:right;">
        	<a href="{{route('home.recipe', ['one' => $info->next->recipe_id])}}" title="{{$info->next->title}}" class="btn btn-danger">
        	    次のレシピ&nbsp;>>
        	</a>
        	</div>
           	@endif
        	</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        @include('elements.sidebar')
    </div>
</div>
@stop