@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
@stop
@section('scripts')
@stop
@section('content')
<h2>カテゴリー@if($id) 編集@else 追加@endif</h2>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                {{Form::open(['route' => ['webmaster.category.confirm', 'one' => $id], 'role'=>"form"])}}
                    <div class="form-group @if($errors->has('name'))has-error @endif">
                        {{Form::label('name', 'カテゴリー名')}}
                        <label class="control-label" for="name">
                            {{$errors->first('name')}}
                        </label>
                        {{Form::text('name', (isset($category->name)) ? $category->name : null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'category name'])}}
                        <small>ファサードなど半角英語で入力してください</small>
                    </div>
                    <div class="form-group @if($errors->has('section_id'))has-error @endif">
                        {{Form::label('section_id', 'セクション')}}
                        <label class="control-label" for="section_id">
                            {{$errors->first('section_id')}}
                        </label>
                        {{Form::select('section_id', $sections, (isset($category->section_id)) ? $category->section_id : null, ['class'=>"form-control"])}}
                    </div>
                    <div class="form-group @if($errors->has('description'))has-error @endif">
                        {{Form::label('description', '詳細')}}
                        <label class="control-label" for="description">
                            {{$errors->first('description')}}
                        </label>
                        {{Form::text('description', (isset($category->description)) ? $category->description : null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'description'])}}
                    </div>
                    {{Form::submit('確認', ['class' => "btn btn-primary"])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop