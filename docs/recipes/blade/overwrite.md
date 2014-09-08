---
Title:    コンテンツの挿入を停止してセクションを上書きする
Topics:   Blade
Position: 16
---

{problem}
Bladeセクションでコンテンツの挿入を停止させたい

コンテンツの挿入を行わずに、同じ名前の前のセクションを上書きしてみましょう
{/problem}

{solution}
Bladeの`@overwrite`構文を利用します

```html
@section('test')
   one
@stop
@section('test')
   two
@stop
@yield('test')
```

上記の記述は次の様に出力されます

```html
one
```

二つ目の `@stop` から `@overwrite` へ変更します

```html
@section('test')
   one
@stop
@section('test')
   two
@overwrite
@yield('test')
```

次の様に出力されます

```html
two
```
{/solution}

{discussion}
`@overwrite`は4種類のセクション終了方法のうちの1つです

他の3つの方法は:

1. `@stop` - [[セクションへの挿入を終了する]].
2. `@show` - [[Bladeテンプレートで現在のセクションを取得する]].
3. `@append` - [[レンダリングを停止してセクションを追加する]].
{/discussion}
