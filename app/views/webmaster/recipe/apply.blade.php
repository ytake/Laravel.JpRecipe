@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
<link href="/css/dist/prism/prism.css" rel="stylesheet" />
@stop
@section('scripts')
<script src="/js/dist/prism/prism.js"></script>
@stop
@section('content')
<h2>レシピ@if($id) 編集@else 追加@endif</h2>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            @if($id)
            新しいレシピが追加されました。
            @else
            レシピを編集しました
            @endif
            <br />
            {{HTML::link(action('webmaster.recipe.list'), '一覧へ', ['class' => 'btn btn-info'])}}
        </div>
    </div>
</div>
@stop