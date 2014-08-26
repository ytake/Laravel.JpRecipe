@extends('layouts.default')
@section('scripts')
@stop
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading recipe-header">
                <h2>
        	        <img src="/images/logos/laravel_jp.png" width="45px" height="45px">&nbsp;質問、感想など
        	    </h2>
        	</div>
       	    <div class="panel-body recipe-body">
                <h3 class="text-danger"><span class="glyphicon glyphicon-ok"></span>&nbsp;レシピについての質問</h3>
                <h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;簡単なレシピばっかり？</h4>
                <p>
                    多くは書学者向けのものである場合が多いですが、日本で独自に追加したレシピ以外は、<br />
                    基本的には原文を翻訳したものになっています(意訳含む)<br />
                    こんなレシピが欲しい！という方は気軽にご連絡を頂けると助かります
                </p>
                <h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;翻訳がおかしい</h4>
                <p>
                    翻訳については、自信がありません！<br />
                    基本的にはwebで提供されている翻訳サービスと文章を組み合わせて翻訳していますので<br />
                    誤り等があれば随時ご連絡ください
                </p>
                <h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;レシピを提供したい</h4>
                <p>
                    もしレシピを提供したいという方がいましたら、<br />
                    <a href="https://github.com/ytake/Laravel.JpRecipe">GitHub</a>でPRを利用してください。<br />
                    基本的には全てマークダウンで記述していただければ幸いです。
                </p>
                <h3 class="text-danger"><span class="glyphicon glyphicon-ok"></span>&nbsp;このサイトについての質問</h3>
                <h4><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;バグをみつけた！</h4>
                <p>
                    バグを見つけた方はお手数おかけしますがご連絡いただくか、<br />
                    <a href="https://github.com/ytake/Laravel.JpRecipe">GitHub</a>でPRを利用してください。<br />
                </p>
        	</div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        @include('elements.sidebar')
    </div>
</div>
@stop