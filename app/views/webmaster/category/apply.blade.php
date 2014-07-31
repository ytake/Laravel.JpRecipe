@section('styles')
@stop
@section('scripts')
@stop
@section('content')
<h2>カテゴリー@if($id) 編集@else 追加@endif</h2>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            @if($id)
            カテゴリーを編集しました。
            @else
            新しいカテゴリーが追加されました。
            @endif
            <br />
            {{HTML::link(action('webmaster.category.list'), '一覧へ', ['class' => 'btn btn-info'])}}
        </div>
    </div>
</div>
@stop