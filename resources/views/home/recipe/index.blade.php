@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col s12 card-panel">
            <h4>
                <img src="/images/logos/laravel_jp.png" width="45px" height="45px">{{$recipe->title}}
            </h4>
            <hr />
            @foreach($tags as $tag)
                <span class="pull-right label-laravel label" title="{{$tag->tag_name}}-タグ">{{$tag->tag_name}}</span>
            @endforeach
            <h3 class="header">
                <i class="fa fa-question-circle"></i>&nbsp;悩み事
            </h3>
            {!!Markdown::render($recipe->problem)!!}
            <h3 class="header">
                <i class="fa fa-chevron-circle-right"></i>&nbsp;解決方法
            </h3>
            {!!Markdown::render($recipe->solution)!!}
            <h3 class="header">
                <i class="fa fa-thumbs-o-up"></i>&nbsp;アドバイス
            </h3>
            {!!Markdown::render($recipe->discussion)!!}

            <blockquote>
                {!!Markdown::render($recipe->credit)!!}
            </blockquote>
            <div class="marginBottom20">
                @if(isset($info->prev))
                    <div style="float:left;">
                        <a href="{{route('home.recipe', ['one' => $info->prev->recipe_id])}}"
                           title="{{$info->prev->title}}" class="btn btn-danger">
                            <<&nbsp;前のレシピ
                        </a>
                    </div>
                @endif
                @if(isset($info->next))
                    <div style="float:right;">
                        <a href="{{route('home.recipe', ['one' => $info->next->recipe_id])}}"
                           title="{{$info->next->title}}" class="btn btn-danger">
                            次のレシピ&nbsp;>>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
@section('styles')
    <link href="/assets/css/monokai_sublime.css" rel="stylesheet"/>
@stop
@section('scripts')
    <script src="/assets/js/highlight.pack.js"></script>
    <script src="/js/application.js"></script>
@stop
