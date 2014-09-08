---
Title:    ロケール(言語)変更を検知する
Topics:   -
Position: 10
---

{problem}
アプリケーションで、表示言語等の変更を検知したい
{/problem}

{solution}
`locale.changed`イベントを使って検知します

このイベントが発動すると、言語が変更されます

```php
\Event::listen('locale.changed', function($locale) {
    echo "Locale changed to ", $locale;
});
```
{/solution}

{discussion}
このイベントは、`App::setLocale()`がコールされた時に発動します

[[デフォルトの実行言語を設定]]も参考にしてください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
