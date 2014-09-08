---
Title:    レンダリングを停止してセクションを追加する
Topics:   Blade
Position: 15
---

{problem}
Bladeで描画中にコンテンツを追加したい

{/problem}

{solution}
Bladeの`@append`を利用します

```html
@section('test')
   one
@stop
@section('test')
   two
@stop
@yield('test')
```

上記のサンプルは下記の用に出力されます

```html
one
```

最後の`@stop` から`@append`に変更します

```html
@section('test')
   one
@stop
@section('test')
   two
@append
@yield('test')
```

これは次の様に出力されます

```html
one
two
```
{/solution}

{discussion}
`@parent`も利用することができます

セクション内の前のセクションのコンテンツをその利用する場合は、  
[[Bladeで親セクションの内容を利用する]] を参照してください
{/discussion}
