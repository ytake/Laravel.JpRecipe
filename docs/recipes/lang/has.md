---
Title:    翻訳を確認
Topics:   localization
Position: 2
---

{problem}
指定したキーの翻訳が存在するか確認したい
{/problem}

{solution}
`Lang::has()`メソッドを利用します

翻訳が存在する場合、  
現在の言語で指定したキーが存在するかどうか返却します  
引数には確認したい翻訳のキーを指定してください  

```php
if (\Lang::has('message.welcome')) {
    echo "The welcome message translation exists for the current locale";
}
```
{/solution}

{discussion}
特定の言語を指定する場合は、第二引数で指定します

```php
if (Lang::has('message.welcome', 'es')) {
    echo "The welcome message translation exists for Spanish";
}
```

引数が指定されていない場合は、現在実行中の言語が指定されます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
