@extends('layouts.default')
@section('scripts')
@stop
@section('content')
<div class="row">
    <div class="col s12 card-panel">
        <h4>
            <img src="/images/logos/laravel_jp.png" width="45px" height="45px">&nbsp;質問、感想など
        </h4>
       	    <div class="panel-body recipe-body">
                <h3><i class="fa fa-hand-o-up"></i>&nbsp;レシピについての質問</h3>
                <h4><i class="fa fa-child"></i>&nbsp;簡単なレシピばっかり？</h4>
                <p>
                    多くはビギナー向けのものである場合が多いですが、日本で独自に追加したレシピ以外は、<br />
                    基本的には原文を翻訳したものになっています(意訳含む)<br />
                    こんなレシピが欲しい！という方は気軽にご連絡を頂けると助かります
                </p>
                <h4><i class="fa fa-caret-square-o-right"></i>&nbsp;翻訳がおかしい</h4>
                <p>
                    翻訳については、自信がありません！<br />
                    基本的にはwebで提供されている翻訳サービスと文章を組み合わせて翻訳していますので<br />
                    誤り等があれば随時ご連絡ください
                </p>
                <h4><i class="fa fa-caret-square-o-right"></i>&nbsp;レシピを提供したい</h4>
                <p>
                    もしレシピを提供したいという方がいましたら、<br />
                    <a href="https://github.com/ytake/Laravel.JpRecipe">GitHub</a>でPRを利用してください。<br />
                    基本的には全てマークダウンで記述していただければ幸いです。
                </p>
                <h3 class="text-danger"><i class="fa fa-question-circle"></i>&nbsp;このサイトについての質問</h3>
                <h4><i class="fa fa-bug"></i>&nbsp;バグをみつけた！</h4>
                <p>
                    バグを見つけた方はお手数おかけしますがご連絡いただくか、<br />
                    <a href="https://github.com/ytake/Laravel.JpRecipe">GitHub</a>でPRを利用してください。<br />
                </p>
        	</div>
        </div>
    </div>
</div>
@stop