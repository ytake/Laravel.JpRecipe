---
Title:    Bladeテンプレートで他のテンプレートをインクルードする
Topics:   Blade
Position: 10
---

{problem}
Bladeテンプレートで他のテンプレートをインクルードしたい

いくつかのテンプレート組み合わせて出力してみましょう
{/problem}

{solution}
`@include`構文を利用します

```html
<html>
<body>
    @include('common-header')
    <h1>Page One</h1>
    <p>bla, bla, bla</p>
</body>
</html>
```

上記のビューが生成される際に、  
`views/common-header.php` または `views/common-header.blade.php`を探して  
`@include('common-header')`が指定したファイルの内容に置き換えられます

#### 変数を指定する事も出来ます

デフォルトでは全ての変数を継承して利用されますが、  
新たに変数を付け加える事が出来ます

例えば、下記の様な`views/partials/item-display.blade.php`というビューがあったとしましょう:

```html
<div>
    Name: {{ $item->name }}<br>
    Description: {{{ $item->description }}}
</div>
```

この _"partial"_ テンプレートをインクルードする時に変数を指定します

```html
<html>
<body>
  <h1>All the items:</h1>
  @foreach ($items as $foo)
    @include('partials.item-display', ['item' => $foo])
  @endforeach
</body>
```
{/solution}

{discussion}
`@include()`は複数行にまたがらない様にして下さい

下記の様なコードは正常に動作しません

```html
@include('my-partial-name', [
    'value1' => 'abc',
    'value2' => $some_var,
    'value3' => date('Y-m-d'),
])
```
{/discussion}
