---
Title:    順序付きリストを生成する
Topics:   html
Position: 14
---

{problem}
Bladeテンプレートで順序付きリストが欲しい
{/problem}

{solution}
`HTML::ol()` メソッドを利用します

メソッドにアイテムのリストを渡します
連想配列を渡した場合、配列の値が利用されます

```html
{{HTML::ol(['a', 'b', 'c'])}}
```

単純なリストが生成されます

```html
<ol>
    <li>a</li>
    <li>b</li>
    <li>c</li>
</ol>
```

要素が配列の場合は、サブリストが生成されます

```php
// $list
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
{{HTML::ol($list)}}
```

次の様に生成されます

```html
<ol>
    <li>one</li>
    <li>two</li>
    <li>
        <ol>
            <li>sub-one</li>
            <li>sub-two</li>
        </ol>
    </li>
</ol>
```

サブリストにタイトルを持たせる場合は、
連想配列の配列キーを利用します

```php
// $list
$list = [
    'one',
    'two',
    'three' => [
        'sub-one',
        'sub-two',
    ],
];
return \View::make('thebladeview', array('list' => $list));
```

Bladeテンプレートに以下のコードがある場合:

```html
{{HTML::ol($list)}}
```

次の様に生成されます

```html
<ol>
    <li>one</li>
    <li>two</li>
    <li>three
        <ol>
            <li>sub-one</li>
            <li>sub-two</li>
        </ol>
    </li>
</ol>
```

リストに属性を追加する場合は、`HTML::ol()`メソッドの第二引数に配列で指定します

```html
{{HTML::ol(['a', 'b'], ['class' => 'mylist'])}}
```

属性`class`が追加されます

```html
<ol class="mylist">
    <li>a</li>
    <li>b</li>
</ol>
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
