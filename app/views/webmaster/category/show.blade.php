@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
<link href="/css/dist/prism/prism.css" rel="stylesheet" />
@stop
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>
@stop
@section('content')
<h2>レシピ:{{$recipe->title}}</h2>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>レシピ タイトル</h3>
            <h4>{{e($recipe->title)}}</h4>
            <hr />
            <h3>カテゴリー</h3>
            <h4>{{$category->name}}</h4>
            <hr />
            <h3>困った時例</h3>
            {{e($recipe->problem)}}
            <hr />
            <h3>解決方法</h3>
            {{Markdown::render($recipe->solution)}}
            <hr />
            <h3>関連事項やアドバイス</h3>
            {{Markdown::render($recipe->discussion)}}
            <hr />
            {{HTML::link(action('webmaster.recipe.form', ['one' => $recipe->recipe_id]), '編集', ['class' => 'btn btn-primary'])}}
        </div>
    </div>
</div>
@stop