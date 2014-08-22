---
Title:    ロケール(言語)変更を検知する
Topics:   -
Code:     App::setLocale(), Event::listen()
Id:       271
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

[[Setting the Default Locale]]も参考にしてください
{/discussion}
