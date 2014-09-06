---
Title:    HTMLエンティティのデコード
Topics:   html
Position: 2
---

{problem}
`HTML::entities()`でエンコードされた文字列をデコードしたい
{/problem}

{solution}
`HTML::decode()`メソッドを利用します

これは`HTML::entities()`の逆です

```php
$string ＝ \HTML::decode('&amp;lt;h1&amp;gt;Hello&amp;lt;/h1&amp;gt;');
```

`$string` は "&lt;h1&gt;Hello&lt;/h1&gt;" となります
{/solution}

{discussion}
このメソッドはPHPの`html_entity_decode()`ラッパー関数です

具体的には`html_entity_decode($value, ENT_QUOTES, 'UTF-8')`をコールしています
これらのオプションは`HTML::entities()`で`htmlentities()`に指定されたものを補完しています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
