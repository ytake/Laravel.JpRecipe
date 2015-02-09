@extends('layouts.default')
@section('styles')
<link href="//cdnjs.cloudflare.com/ajax/libs/flexslider/2.2.2/flexslider-min.css" rel="stylesheet" type="text/css">
@stop
@section('scripts')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/flexslider/2.2.2/jquery.flexslider-min.js"></script>
<script>
$(document).ready(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>
@stop
@section('content')
<div class="row">
    @if($errors->has('words'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        {{$errors->first('words')}}
    </div>
    @endif
</div>
@include('elements.search')
<div class="row">
    <div class="col-md-12 text-center">
        <div class="panel panel-default">
            <div class="flexslider">
                <ul class="slides">
                @foreach($news_feeder as $feed)
                    <li>
                        <span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;
                        <a href="{{$feed->link}}" title="{{$feed->title}}">{{$feed->title}}</a>&nbsp;
                        {!!$feed->description!!}
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- contents --}}
<div class="row">
    <div class="col-md-4 col-sm-6">
        @for($i = 1; $i <= count($sections); $i++)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{route('home.section', ['one' => $sections[$i - 1]->section_id])}}" title="{{$sections[$i - 1]->description}}" class="pull-right label label-info">View all</a>
                <span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;{{$sections[$i - 1]->name}}
            </div>
            <div class="panel-body">
                <span class="glyphicon glyphicon-ok"></span>
                {{$sections[$i - 1]->description}}
                <table class="table">
                    <tr>
                        <td>
                            <dl>
                            @foreach($sections[$i - 1]->recipes as $recipe)
                                <dt>
                                    <p class="font-medium">
                                        <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                                        <a href="{{route('home.recipe', ['one' => $recipe->recipe_id])}}" title="{{$recipe->title}}">{{$recipe->title}}</a>
                                    </p>
                                </dt>
                            @endforeach
                            </dl>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @endfor
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>&nbsp;最新レシピ
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <dl>
                            @foreach($latest as $late)
                                <dt>
                                    <p class="font-medium">
                                        <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                                        <a href="{{route('home.recipe', ['one' => $late->recipe_id])}}" title="{{$late->title}}">{{$late->title}}</a>
                                    </p>
                                </dt>
                                <dd>
                                    <small>
                                        <span class="glyphicon glyphicon-link"></span>&nbsp;
                                        <a href="{{route('home.category', ['one' => $late->category_id])}}">
                                            {{$late->name}}
                                        </a>/&nbsp;{{datetime_format($late->created_at, "%Y年%m月%d日 %H:%M")}}
                                    </small>
                                </dd>
                            @endforeach
                            </dl>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-sort-by-attributes"></span>&nbsp;&nbsp;人気レシピ
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <dl>
                            @foreach($popular as $row)
                                <dt>
                                    <p class="font-medium">
                                        <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                                        <a href="{{route('home.recipe', ['one' => $row->recipe_id])}}" title="{{$row->title}}">{{$row->title}}</a>
                                    </p>
                                </dt>
                                <dd>
                                    <small>
                                        <span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;
                                        <a href="{{route('home.category', ['one' => $row->category_id])}}">
                                            {{$row->name}}
                                        </a>
                                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;{{$row->views}}:views&nbsp;/&nbsp;
                                    </small>
                                </dd>
                            @endforeach
                            </dl>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        @include('elements.sidebar')
    </div>
</div>
@include('elements.information')
@stop
