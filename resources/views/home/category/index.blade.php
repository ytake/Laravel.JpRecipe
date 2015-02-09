@extends('layouts.default')
@section('scripts')
@stop
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading recipe-header">
                <h3>
        	        <span class="glyphicon glyphicon-glass"></span>{{$category->name}} カテゴリー
        	    </h3>
        	</div>
       	    <div class="panel-body recipe-body">
                <p class="lead">{{$category->description}}</p>
                <hr />
                @foreach($list as $row)
                <p><span class="glyphicon glyphicon-cutlery">&nbsp;<a href="{{route('home.recipe', ['one' => $row->recipe_id])}}" title="{{$row->title}}">{{$row->title}}</a></span></p>
                @endforeach
        	</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        @include('elements.sidebar')
    </div>
</div>
@stop