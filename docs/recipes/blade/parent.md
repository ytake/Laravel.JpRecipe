---
Title:    Bladeで親セクションの内容を利用する
Topics:   Blade
Position: 17
---

{problem}
Bladeでテンプレートで親セクションの内容をマージしたい
{/problem}

{solution}
`@parent` 構文を利用します

前のセクションの内容を利用するには、_同じ名前にします_

サンプル:

```html
@section('test')
  @parent
  Bottom
@stop

{{-- Later --}}
@section('test')
   Top
@show
```

次の様に出力されます

```html
Top
Bottom
```
{/solution}

{discussion}
`@extend`を使用する場合は、  
まず既存のテンプレートをロードして処理します  
その後、`@extend`で指定されたテンプレートが処理されます

`@extend` と `@parent`はうまく互いに補完しあった方法をとっています
{/discussion}
