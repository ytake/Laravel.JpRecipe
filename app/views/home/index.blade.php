@extends('layouts.default')
@section('scripts')
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
    @if($errors->has('auth_error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        {{$errors->first('auth_error')}}
    </div>
    @endif
</div>
@include('elements.search')
{{-- contents --}}
<div class="row">
    <div class="col-md-4 col-sm-6">
        @for($i = 1; $i <= count($sections); $i++)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{HTML::linkAction('home.section', "View all", ['one' => $sections[$i - 1]->section_id], ['class' => 'pull-right label label-info', 'alt' => $sections[$i - 1]->description, 'title' => $sections[$i - 1]->description])}}
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
                                        {{HTML::linkAction('home.recipe', $recipe->title, ['one' => $recipe->recipe_id], ['alt' => $recipe->title, 'title' => $recipe->title])}}
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
                                        {{HTML::linkAction('home.recipe', $late->title, ['one' => $late->recipe_id], ['alt' => $late->title, 'title' => $late->title])}}
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
            <div class="panel-heading"><span class="glyphicon glyphicon-sort-by-attributes"></span>&nbsp;&nbsp;人気レシピ</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <dl>
                            @foreach($popular as $row)
                                <dt>
                                    <p class="font-medium">
                                        <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                                        {{HTML::linkAction('home.recipe', $row->title, ['one' => $row->recipe_id], ['alt' => $row->title, 'title' => $row->title])}}
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