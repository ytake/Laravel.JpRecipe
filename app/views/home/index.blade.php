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
                <div class="col-md-4 col-sm-6">
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
                <div class="col-md-4 col-sm-6">
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
                                                    <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;{{$recipe->title}}
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
                                                    <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;{{$late->title}}
                                                </h5>
                                            </dt>
                                            <dd>
                                                <div align="right">
                                                    <small>
                                                        <a href="{{route('home.category', ['one' => $late->category_id])}}">
                                                            <span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;{{$late->name}}
                                                        </a>
                                                    </small>
                                                </div>
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

                                        </dl>
                                    </td>
                                </tr>
                            </table>
                        </div><!--/.col-md-3-->
                    </div>
                </div>
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section>
@stop