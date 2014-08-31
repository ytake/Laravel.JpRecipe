---
Title:    セクションへの挿入を終了する
Topics:   -
Code:     @stop
Id:       242
Position: 14
---

{problem}
出力せずにBladeのセクションへの挿入を終了したい
{/problem}

{solution}
`@stop` 構文を利用してセクションを終了させます

```html
@section('nav')
  <ul>
    <li><a href="#">link 1</a></li>
    <li><a href="#">link 2</a></li>
  </ul>
@stop
```

セクション名を`nav`として、後から`@yield`を使用して出力する事が出来ます
{/solution}

{discussion}
これは既存のセクションには追加されません

既存のセクションに追加したい場合は、`@append`を利用してセクションを終了します

`@stop`は既存のセクションを上書きしません

下記の様なテンプレートがあれば:

```html
@section('test')
   one
@stop
@section('test')
   two
@stop
@yield('test')
```

下記の様に出力されます

```html
one
```

`@parent`を利用して、前のセクションの内容を利用する事が出来ます
[[Bladeで親セクションの内容を利用する]]
{/discussion}
