---
Title:    デフォルトで利用されている言語環境を取得する
Topics:   localization
Position: 4
---

{problem}
現在アプリケーションで使用されているデフォルトの言語環境を取得したい
{/problem}

{solution}
`Lang::getLocale()`メソッド、  
またはエイリアスの`Lang::locale()`を利用します

translatorが利用している現在のデフォルト言語環境を取得します

```php
echo Lang::getLocale();
```
{/solution}

{discussion}
`Lang::getLocale()` と `App::getLocale()`の違いは何でしょうか？

`Lang::getLocale()`は、現在translatorで利用されている言語環境を返却します  
`App::getLocale()`は、コンフィグファイルで指定されている言語環境を取得します

ほとんどの場合は、同じ値を返却しますが、  
`Lang::setLocale()`で任意で変更された場合は異なる値を返却します  
ただし、システムに影響は与えず変更されます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
