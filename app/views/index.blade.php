@extends('layouts.default')
@section('scripts')
<!--
<script type="text/jsx" src="/js/react/content.js"></script>
-->
@stop
@section('content')
<section id="title" class="search">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>レシピ検索</h1>
            </div>
        </div>
        <form role="form">
            <div class="input-group">
                <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </div>
</section>

<section id="services" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-md"></i>
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
                        <i class="icon-md"></i>
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
                        <i class="icon-md"></i>
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
<section class="container">
    <div class="row">
        <aside class="col-sm-3 col-sm-push-9">
            <div class="widget categories">
                @include('elements.sidebar')
            </div><!--/.categories-->
        </aside>
        <div class="col-sm-9 col-sm-pull-3">
            <div class="blog">
                <div class="blog-item">
                    <div id="pricing-table" class="row">
                        <div class="col-md-6 col-xs-6">
                            <div align="center">
                                <h3>最新レシピ</h3>
                            </div>
                            <dl class="dl-horizontal">
                                <dt><span class="glyphicon glyphicon-cutlery"></span>レシピ名</dt>
                                <dd>レシピ</dd>
                            </dl>
                        </div><!--/.col-md-3-->
                        <div class="col-md-6 col-xs-6">
                            <div align="center">
                                <h3>人気レシピ</h3>
                            </div>
                            <dl class="dl-horizontal">
                                <dt><span class="glyphicon glyphicon-cutlery"></span>レシピ名</dt>
                                <dd>レシピ</dd>
                                <dd>0 views / section / category</dd>
                                <hr />
                                <dt><span class="glyphicon glyphicon-cutlery"></span>レシピ名</dt>
                                <dd>レシピ</dd>
                                <dd>0 views / section / category</dd>
                                <hr />
                                <dt><span class="glyphicon glyphicon-cutlery"></span>レシピ名</dt>
                                <dd>レシピ</dd>
                                <dd>0 views / section / category</dd>
                                <hr />
                                <dt><span class="glyphicon glyphicon-cutlery"></span>レシピ名</dt>
                                <dd>レシピ</dd>
                                <dd>0 views / section / category</dd>
                                <hr />
                                <dt><span class="glyphicon glyphicon-cutlery"></span>レシピ名</dt>
                                <dd>レシピ</dd>
                                <dd>0 views / section / category</dd>
                                <hr />
                            </dl>
                        </div><!--/.col-md-3-->
                    </div>
                    <hr />
                </div>
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section>
@stop