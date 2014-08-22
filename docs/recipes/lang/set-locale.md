---
Title:    デフォルトの実行言語を設定
Topics:   localization
Code:     Lang::setLocale()
Id:       254
Position: 5
---

{problem}
デフォルトの言語を設定したい
{/problem}

{solution}
`Lang::setLocale()`メソッドを利用します

```php
\Lang::setLocale('ja'); // 日本語に変更
```
{/solution}

{discussion}
`App::setLocale()` と `Lang::setLocale()`の違いは何でしょうか？

`Lang::setLocale()`は、現在ロードされているサービスにのみ作用します

`App::setLocale()`は、現在ロードされているサービスに作用し、  
`Lang::setLocale()`をコールしてtranslatorを更新します
また`locale.changed`イベントを発動させます
{/discussion}
