---
Title:    'Remember Me'で利用されるCookie名を取得
Topics:   -
Position: 32
---

{problem}
"remember me"で利用されるcookie名を知りたい
{/problem}

{solution}
`Auth::getRecallerName()`メソッドを利用します

```php
$remember_name = Auth::getRecallerName();
```
{/solution}

{discussion}
このCookieの名前は'remember_'から始まる、長い文字列です

大体は `remember_82e5d2c56bdd0811318f0cf078b78bfc` の様な文字列になります。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
