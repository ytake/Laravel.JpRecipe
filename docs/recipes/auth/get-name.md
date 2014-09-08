---
Title:    認証で使用されるCookieの名前を取得する
Topics:   -
Code:     Auth::getName()
Id:       228
Position: 33
---

{problem}
認証で使用されるCookieの名前を知りたい
{/problem}

{solution}
`Auth::getName()`メソッドを利用します

```php
$cookie_name = Auth::getName();
```
{/solution}

{discussion}
このCookieの名前は'login_'から始まる、長い文字列です

大体は `login_82e5d2c56bdd0811318f0cf078b78bfc` の様な文字列になります
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
