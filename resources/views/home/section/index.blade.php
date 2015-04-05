@extends('layouts.default')
@section('scripts')
@stop
@section('content')
    <div class="row">
        <div class="col s12 card-panel">
            <h3>
                <i class="fa fa-comments"></i>セクション:{{$section->name}}
            </h3>
            <hr/>
            @foreach($list as $row)
                <p>
                    <i class="fa fa-cutlery"></i>&nbsp;
                    <a href="{{route('home.category', ['one' => $row->category_id])}}" title="$row->description">
                        {{$row->description}}
                    </a>
                </p>
            @endforeach
        </div>
    </div>
@stop
