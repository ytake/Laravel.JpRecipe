---
Title:    順序なしリストを生成する
Topics:   html
Position: 15
---

{problem}
Bladeテンプレートで順序なしリストが欲しい
{/problem}

{solution}
`HTML::ul()` メソッドを利用します

メソッドにアイテムのリストを渡します  
連想配列を渡した場合、配列の値が利用されます

```html
{{HTML::ul(['a', 'b', 'c'])}}
```

単純なリストが生成されます

```html
<ul>
    <li>a</li>
    <li>b</li>
    <li>c</li>
</ul>
```

要素が配列の場合は、サブリストが生成されます

```php
$list = [
    'one',
    'two',
    [
        'sub-one',
        'sub-two',
    ],
];
return \View::make('thebladeview', ['list' => $list]);
```

Bladeテンプレートに以下のコードがある場合:

```html
{{HTML::ul($list)}}
```

次の様に生成されます

```html
<ul>
    <li>one</li>
    <li>two</li>
    <li>
        <ul>
            <li>sub-one</li>
            <li>sub-two</li>
        </ul>
    </li>
</ul>
```

サブリストにタイトルを持たせる場合は、  
連想配列の配列キーを利用します

```php
$list = [
    'one',
    'two',
    'three' => [
        'sub-one',
        'sub-two',
    ],
];
return \View::make('thebladeview', ['list' => $list]);
```

Bladeテンプレートに以下のコードがある場合:

```html
{{HTML::ul($list)}}
```

次の様に生成されます

```html
<ul>
    <li>one</li>
    <li>two</li>
    <li>three
        <ul>
            <li>sub-one</li>
            <li>sub-two</li>
        </ul>
    </li>
</ul>
```

リストに属性を追加する場合は、`HTML::ul()`メソッドの第二引数に配列で指定します

```html
{{HTML::ul(['a', 'b'], ['class' => 'mylist'])}}
```

属性`class`が追加されます

```html
<ul class="mylist">
    <li>a</li>
    <li>b</li>
</ul>
```
{/solution}

{discussion}
1. リストの値はエスケープされます
2. 第二引数 `$attributes`, トップレベルのリストに適用されますが、サブリストを持っている場合、それらには属性が含まれません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
