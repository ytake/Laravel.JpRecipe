@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
<link href="/css/dist/prettify/prettify.css" rel="stylesheet">
@stop
@section('scripts')
<script src="/js/dist/prettify/prettify.js"></script>
<script>prettyPrint();</script>
@stop
@section('content')
<h2>レシピ追加</h2>
<h5>レシピの追加ができます</h5>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                {{Form::open(['route' => ['webmaster.recipe.apply', 'id' => $id], 'role'=>"form"])}}
                    {{$hidden}}
                    <div class="form-group">
                        {{Form::label('title', 'レシピ タイトル')}}
                        {{e(Input::get('title'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('category_id', 'カテゴリー')}}
                        {{Form::select('category_id', $categories, Input::get('category_id'), ['class'=>"form-control", 'disabled'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('problem', '困った時例')}}
                        {{e(Input::get('problem'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('solution', '解決方法:markdown記法')}}
                        <div id="markdown">
                            {{Markdown::render(Input::get('solution'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('discussion', '関連事項やアドバイス')}}
                        {{e(Input::get('discussion'))}}
                    </div>
                    {{Form::submit('戻る', ['class' => "btn btn-warning", 'name' => '_return'])}}
                    {{Form::submit('レシピを追加', ['class' => "btn btn-primary", 'name' => '_apply'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop