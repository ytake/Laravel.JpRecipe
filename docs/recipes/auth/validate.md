---
Title:    資格情報をバリデートする
Topics:   -
Position: 21
---

{problem}
ログインさせずに、ログインで使用される資格情報のバリデートをしたい
{/problem}

{solution}
`Auth::validate()`メソッドを利用します

資格情報を配列で指定します

```php
$credentials = [
    'username' => 'mylogin',
    'password' => 'mypass',
];
$valid = \Auth::validate($credentials);
if(!$valid) {
    throw new \Exception('Invalid credentials');
}
```
{/solution}

{discussion}
認証のバリデートは、`auth.attempt`イベントを発生させます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
