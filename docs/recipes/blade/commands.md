---
Title:    Bladeで利用できるメソッド一覧
Topics:   Blade
Position: 22
---

{problem}
Bladeで利用できるメソッド一覧がほしい
{/problem}

{solution}
最初から定義されている、すぐに使えるメソッドは下記の通りです

* `{{ $var }}` - $varをecho
* `{{ $var or 'default' }}` - デフォルトを設定して、$varをecho
* `{{{ $var }}}` - エスケープ
* `{{-- Comment --}}` - Bladeコメント
* `@extends('layout')` - layoutテンプレートを継承する
* `@if(condition)` - **if** の始まり
* `@else` - **else** ブロック
* `@elseif(condition)` - **elseif** ブロック
* `@endif` -  **if** の終了
* `@foreach($list as $key => $val)` - **foreach** の始まり
* `@endforeach` - **foreach** の終わり
* `@for($i = 0; $i < 10; $i++)` - **for** の始まり
* `@endfor` - **for** の終わり
* `@while(condition)` - **while** の始まり
* `@endwhile` - **while** の終わり
* `@unless(condition)` - **unless** の始まり
* `@endunless` - **unless** の終わり
* `@include(file)` - 指定したテンプレートをインクルード
* `@include(file, ['var' => $val,...])` - テンプレートをインクルードする際に変数を渡します
* `@each('file',$list,'item')` - コレクションをレンダリング
* `@each('file',$list,'item','empty')` - コレクションを指定し、空の場合は別のテンプレートを割り当ててレンダリング
* `@yield('section')` - 'section'の内容を生成
* `@show` - セクションを終了させて、内容を生成
* `@lang('message')` - 言語環境に沿った文字列を生成
* `@choice('message', $count)` - 言語に沿った文字列を複数形で出力
* `@section('name')` - セクションの始まり
* `@stop` - セクションの終わり
* `@endsection` - セクションの終わり
* `@append` - セクションを終了させて、既存のセクションに追加します
* `@overwrite` - セクションを上書き
{/solution}

{discussion}
[Laravel Cheat Sheet](http://cheats.jesse-obrien.ca/)を見ると良いかもしれません
{/discussion}
