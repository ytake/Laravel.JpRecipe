@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
<link href="/css/dist/prism/prism.css" rel="stylesheet" />
@stop
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>
@stop
@section('content')
<h2>レシピ@if($id) 編集@else 追加@endif</h2>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                {{Form::open(['route' => ['webmaster.recipe.apply', 'one' => $id], 'role'=>"form"])}}
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
                        {{Form::label('solution', '解決方法')}}
                        <div id="markdown">
                            {{Markdown::render(Input::get('solution'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('discussion', '関連事項やアドバイス')}}
                        {{Markdown::render(Input::get('discussion'))}}
                    </div>
                    {{Form::submit('戻る', ['class' => "btn btn-warning", 'name' => '_return'])}}
                    @if($id)
                    {{Form::submit('レシピを編集', ['class' => "btn btn-primary", 'name' => '_apply'])}}
                    @else
                    {{Form::submit('レシピを追加', ['class' => "btn btn-primary", 'name' => '_apply'])}}
                    @endif
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop