@extends('layouts.default')
@section('scripts')
@stop
@section('content')
    <div class="row">
        <div class="col s12 card-panel">
            <h3>
                <i class="fa fa-comments"></i>&nbsp;{{$category->name}} カテゴリー
            </h3>
            <p class="header">{{$category->description}}</p>
            <hr/>
            @foreach($list as $row)
                <p>
                    <i class="fa fa-cutlery"></i>&nbsp;
                    <a href="{{route('home.recipe', ['one' => $row->recipe_id])}}" title="{{$row->title}}">
                        {{$row->title}}
                    </a>
                </p>
            @endforeach
        </div>
    </div>
@stop
