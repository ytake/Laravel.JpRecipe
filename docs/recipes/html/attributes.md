---
Title:    HTMLの属性を配列で作成する
Topics:   html
Position: 16
---

{problem}
HTMLを構成する属性を配列から文字列に変換したい
{/problem}

{solution}
`HTML::attributes()`メソッドを利用します

```php
echo \HTML::attributes(['id' => '123', 'class' => 'myclass']);
```

配列のキーは属性名、配列の値は属性値となります  
出力は次の様になります

```text
id="123" class="myclass"
```
{/solution}

{discussion}
これはHTMLまたはFormマクロに使用されるケースが多いでしょう

HTMLあるいはXMLを構築する場合に便利です。

[[Formマクロを作成する]] と
[[HTMLマクロを作成する]] をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
