---
Title:    HTML文字列をエンティティへ変換する
Topics:   html
Position: 1
---

{problem}
webページを _"escape"_ して出力したい

一般的にはPHPの `htmlentities()` メソッドが利用されますが、  
これをLaravel流に利用してみましょう
{/problem}

{solution}
`HTML::entities()`メソッドを利用します

```php
echo \HTML::entities('<h1>Title example</h1>');
```

上記の例は`<` と `>` をそれぞれ &amp;lt; と &amp;gt; へ変換します

ヘルパーの `e()` を利用する事もできます

```php
echo e('<h1>Title example</h1>');
```

上記の例は`HTML::entities()`メソッドと同じものを出力します
{/solution}

{discussion}
このメソッドは、`htmlentities()`を利用しています

具体的には `htmlentities($your_string, ENT_QUOTES, 'UTF-8', false)` としてコールしています

シングルクオートとダブルクオートを共に変換し、文字を変換するときにUTF-8が利用されます  
[PHPマニュアル htmlspecialchars](http://php.net/manual/ja/function.htmlspecialchars.php)
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
