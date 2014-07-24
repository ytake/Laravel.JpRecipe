@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
@stop
@section('scripts')
@stop
@section('content')
<h2>レシピ追加</h2>
<h5>レシピの追加ができます</h5>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                {{Form::open(['route' => ['webmaster.recipe.confirm', $id], 'role'=>"form"])}}
                    <div class="form-group">
                        {{Form::label('title', 'レシピ タイトル')}}
                        {{Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'recipe title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('category_id', 'カテゴリー')}}
                        {{Form::select('category_id', $categories, null, ['class'=>"form-control"])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('problem', '困った時')}}
                        {{Form::textarea('problem', null, ['class' => 'form-control', 'rows'=>"3", 'id' => 'problem', 'placeholder' => 'こんな場合に困った、というガイドになります'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('solution', '解決策:markdown記法')}}
                        {{Form::textarea('solution', null, ['class' => 'form-control', 'rows'=>"30", 'data-provide' => 'markdown', 'id' => 'solution', 'placeholder' => '解決策を詳細に記述してください'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('discussion', '関連事項')}}
                        {{Form::textarea('discussion', null, ['class' => 'form-control', 'rows'=>"10", 'data-provide' => 'markdown', 'id' => 'discussion', 'placeholder' => '関連事項や、アドバイスがあれば記述してください'])}}
                    </div>
                    {{Form::submit('確認', ['class' => "btn btn-primary"])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop