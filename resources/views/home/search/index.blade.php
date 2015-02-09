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
       	        @if($list->getIterator()->count())
                @foreach($list as $row)
                <p>
                    <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                    <a href="{{route('home.recipe', ['one' => $row->recipe_id])}}" title="{{$row->title}}">{{$row->title}}</a>
                    &nbsp;/&nbsp;<small><a href="{{route('home.category', ['one' => $row->category_id])}}"><span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;{{$row->name}}:カテゴリー</a></small>
                </p>
                @endforeach
                {!!$list->appends(['words' => \Input::get('words')])->setPath('search')->render()!!}
                @else
                <span class="glyphicon glyphicon-search"></span>&nbsp;{{Input::get('words')}} 関連のレシピは見つかりませんでした
                @endif
        	</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        @include('elements.sidebar')
    </div>
</div>
@stop