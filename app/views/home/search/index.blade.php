@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading recipe-header">
                <h3>
        	        <span class="glyphicon glyphicon-glass"></span>検索キーワード : {{Input::get('words')}}
        	    </h3>
        	</div>
       	    <div class="panel-body recipe-body">
                @foreach($list as $row)
                <p>
                    <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                    {{HTML::linkAction('home.recipe', $row->title, ['one' => $row->recipe_id], ['alt' => $row->title, 'title' => $row->title])}}
                    &nbsp;/&nbsp;<small><a href="{{route('home.category', ['one' => $row->category_id])}}"><span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;{{$row->name}}:カテゴリー</a></small>
                </p>
                @endforeach
                {{$list->appends(['words' => \Input::get('words')])->links()}}
        	</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        @include('elements.sidebar')
    </div>
</div>
@stop