@extends('layouts.default')
@section('scripts')
<!--
<script type="text/jsx" src="/js/react/content.js"></script>
-->
@stop
@section('content')
<div class="site-hero">
    <section id="services" class="recipe-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 right-line">
                    <div class="media">
                        <div class="pull-left">
                            <i class="flaticon-fire14 icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Laravel Recipes(JP)</h3>
                            <p>Laravel Recipes(JP)はオープンソースで公開されています。Laravelの学習やサンプル等にお役立て下さい</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-md-4 col-sm-6 right-line">
                    <div class="media">
                        <div class="pull-left">
                            <i class="flaticon-icomoon1 icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">セクションから選ぶ</h3>
                            <p>各セクションからレシピを探す事ができます。</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                            <i class="flaticon-paragraph11 icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">カテゴリーから選ぶ</h3>
                            <p>各カテゴリーからレシピを探す事ができます。カテゴリーのほとんどがLaravel Facade名と対応しています</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
            </div>
        </div>
    </section><!--/#services-->
</div>
<section class="container">
    <div class="row">
        @if($errors->has('words'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{$errors->first('words')}}
            </div>
        @endif
        @if($errors->has('auth_error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{$errors->first('auth_error')}}
            </div>
        @endif
        <aside class="col-sm-3 col-sm-push-9">
            <div class="widget categories">
                @include('elements.sidebar')
            </div><!--/.categories-->
        </aside>
        <div class="col-sm-9 col-sm-pull-3">
            <div class="recipe-content">
                <div class="recipe-item">
                    <div id="pricing-table" class="row">
                    @for($i = 1; $i <= count($sections); $i++)
                        <div class="col-md-6 col-xs-6">
                            <h3><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;{{$sections[$i - 1]->name}}</h3>
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
                        </div><!--/.col-md-3-->
                    @if($i != 0 && $i % 2 == 0)
                    </div>
                    <div id="pricing-table" class="row">
                    @endif
                    @endfor
                    </div>
                </div>
            </div>
            <div class="recipe-content">
                <div class="recipe-item">
                    <div id="pricing-table" class="row">
                        <div class="col-md-6 col-xs-6">
                            <h3><span class="glyphicon glyphicon-sort-by-attributes-alt"></span>&nbsp;&nbsp;最新レシピ</h3>
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
                        </div><!--/.col-md-3-->
                        <div class="col-md-6 col-xs-6">
                            <h3><span class="glyphicon glyphicon-sort-by-attributes"></span>&nbsp;&nbsp;人気レシピ</h3>
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
                        </div><!--/.col-md-3-->
                    </div>
                </div>
            </div>
        </div><!--/.col-md-8-->
		<ul class="nav nav-stacked sp-sns-btn">
			<li>
				<div class="fb-like" data-href="{{url()}}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			</li>
			<li>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url()}}" data-text="laravel-recipes.comnect.jp.net">Tweet</a>
			</li>
			<li>
				<a href="http://b.hatena.ne.jp/entry/{{url()}}" class="hatena-bookmark-button" data-hatena-bookmark-title="111111" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
			</li>
			<li>
				<div class="g-plus" data-action="share" data-href="{{url()}}"></div>
			</li>
		</ul>
    </div><!--/.row-->
</section>
@stop
