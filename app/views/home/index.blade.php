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
<div class="row">
    @if(!Request::is('auth/login*'))
    <div class="col-md-12 text-center">
        <section id="title" class="search">
            <div class="row">
                <div class="col-sm-12">
                    <h1>レシピ検索</h1>
                </div>
            </div>
            {{\Form::open(['action' => 'search.index', 'method' => 'GET'])}}
            <div class="input-group">
                {{Form::text('words', Input::get('words'), ['class' => "form-control", 'autocomplete' => "off", 'placeholder' => "検索したいキーワードを入力して下さい"])}}
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
            {{\Form::close()}}
        </section>
    </div>
    @endif
</div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            @for($i = 1; $i <= count($sections); $i++)
            <div class="panel panel-default">
                <div class="panel-heading">
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
                                        <h5>
                                            <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                                            {{HTML::linkAction('home.recipe', $recipe->title, ['one' => $recipe->recipe_id], ['alt' => $recipe->title, 'title' => $recipe->title])}}
                                        </h5>
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
                    <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>&nbsp;&nbsp;最新レシピ
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <dl>
                                @foreach($latest as $late)
                                    <dt>
                                        <h5>
                                            <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                                            {{HTML::linkAction('home.recipe', $late->title, ['one' => $late->recipe_id], ['alt' => $late->title, 'title' => $late->title])}}
                                        </h5>
                                    </dt>
                                    <dd>
                                        <small>
                                            <a href="{{route('home.category', ['one' => $late->category_id])}}">
                                                <span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;{{$late->name}}
                                            </a>
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
                                        <h5>
                                            <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
                                            {{HTML::linkAction('home.recipe', $row->title, ['one' => $row->recipe_id], ['alt' => $row->title, 'title' => $row->title])}}
                                        </h5>
                                    </dt>
                                    <dd>
                                        <small>
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;{{$row->views}}:views&nbsp;/&nbsp;
                                            <a href="{{route('home.category', ['one' => $row->category_id])}}">
                                                <span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;{{$row->name}}
                                            </a>
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
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">このレシピサイトについて</div>
                <div class="panel-body">
                    <p>
                        このサイトは<a href="http://laravel-recipes.com/" target="_blank" alt="Laravel Recipes">Laravel Recipes</a>のレシピを日本語訳にしたものと、<br />
                        日本独自のレシピを含んでします。<br />
                        レシピの要望等がありましたら、お気軽にご連絡ください。<br />
                        またこのサイトはオープンソースで公開されています。<br />
                        Laravelの学習等にお役立てください<br />
                        <a class="btn btn-info center-block" href="https://github.com/ytake/Laravel.JpRecipe" alt="Laravel.JpRecipe">Laravel.JpRecipe</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">レシピを探す</div>
                <div class="panel-body">
                    LaravelのFacadeに沿って、レシピを探す事ができます。<br />
                    希望のレシピが無い、レシピを持っているよ！という方はお気軽にご連絡、<br />
                    またはレシピをGitHub等を通じて送って下さい。<br />
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Packalyst::Latest Packages
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                    @foreach($feeder as $feed)
                        <li>
                            <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;
                            {{HTML::link($feed->link, $feed->content)}}&nbsp;
                            <small>release:{{date('Y-m-d H:i', strtotime($feed->dateModified->date))}}</small>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
