@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
<link href="/css/dist/fancybox/jquery.fancybox.css" rel="stylesheet" type='text/css' />
@stop
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.11/jquery.mousewheel.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="/js/preview.js"></script>
@stop
@section('content')
<h2>レシピ@if($id) 編集@else 追加@endif</h2>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                {{Form::open(['route' => ['webmaster.recipe.confirm', 'one' => $id], 'role'=>"form"])}}
                    <div class="form-group @if($errors->has('title'))has-error @endif">
                        {{Form::label('title', 'レシピ タイトル')}}
                        <label class="control-label" for="title">
                            {{$errors->first('title')}}
                        </label>
                        {{Form::text('title', (isset($recipe->title)) ? $recipe->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'recipe title'])}}
                    </div>
                    <div class="form-group @if($errors->has('category_id'))has-error @endif">
                        {{Form::label('category_id', 'カテゴリー')}}
                        <label class="control-label" for="category_id">
                            {{$errors->first('category_id')}}
                        </label>
                        {{Form::select('category_id', $categories, (isset($recipe->category_id)) ? $recipe->category_id : null, ['class'=>"form-control"])}}
                    </div>
                    <div class="form-group @if($errors->has('problem'))has-error @endif">
                        {{Form::label('problem', '困った時例')}}
                        <label class="control-label" for="problem">
                            {{$errors->first('problem')}}
                        </label>
                        {{Form::textarea('problem', (isset($recipe->problem)) ? $recipe->problem : null, ['class' => 'form-control', 'rows'=>"3", 'id' => 'problem', 'placeholder' => 'こんな場合に困った、というガイドになります'])}}
                    </div>
                    <div class="form-group @if($errors->has('solution'))has-error @endif">
                        {{Form::label('solution', '解決方法')}}
                        <label class="control-label" for="solution">
                            {{$errors->first('solution')}}
                        </label>
                        {{Form::textarea('solution', (isset($recipe->solution)) ? $recipe->solution : null, ['class' => 'form-control', 'rows'=>"30", 'data-provide' => 'markdown', 'id' => 'solution', 'placeholder' => '解決策を詳細に記述してください'])}}
                    </div>
                    <div class="form-group @if($errors->has('discussion'))has-error @endif">
                        {{Form::label('discussion', '関連事項やアドバイス')}}
                        <label class="control-label" for="discussion">
                            {{$errors->first('discussion')}}
                        </label>
                        {{Form::textarea('discussion', (isset($recipe->discussion)) ? $recipe->discussion : null, ['class' => 'form-control', 'rows'=>"10", 'data-provide' => 'markdown', 'id' => 'discussion', 'placeholder' => '関連事項や、アドバイスがあれば記述してください'])}}
                    </div>
                    {{Form::submit('確認', ['class' => "btn btn-primary"])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop