---
Title:    コレクション内の項目をレンダリングする
Topics:   -
Code:     @foreach
Id:       239
Position: 11
---

{problem}
Bladeテンプレートでコレクション内の項目をレンダリングしたい
{/problem}

{solution}
Bladeの`@each`を利用します

少なくとも3つの引数を指定する必要があります:

1. レンダリングするビューファイル名
2. コレクション(配列等)
3. 利用する項目名

例えば、Bladeテンプレートで以下の様なコードがある場合

```html
Items:
@each('items.single', $items, 'item')
```

これは次の意味を持ちます:

```html
Items:
@foreach ($items as $item)
    @include('items.single', ['item' => $item])
@endforeach
```
{/solution}

{discussion}
第四引数にコレクションが空の場合に表示するものを指定する事が出来ます

```html
Items:
@each('items.single', $items, 'item', 'items.empty')
```

`$items`が空の場合に`items.empty`ビューがレンダリングされます。
第四引数にビューではなく、文字列を指定する事も可能です

```html
Items:
@each('items.single', $items, 'item', 'raw|There are no items')
```

`$items`が空の場合に次の様なHTMLが出力されます

```html
Items:
There are no items
```
{/discussion}
