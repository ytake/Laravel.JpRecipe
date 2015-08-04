---
Title:    ハッシュ値を生成する
Topics:   -
Position: 1
---

{problem}
文字列のハッシュを作りたい
{/problem}

{solution}
`Hash::make()`メソッドを利用します

```php
$hashed_password = \Hash::make($plaintext_password);
```
{/solution}

{discussion}
ハッシュは`Blowfish`アルゴリズムを使用しています

[Blowfish](http://ja.wikipedia.org/wiki/Blowfish)  

ハッシュ値を作成する時に、パラメータを指定する事ができます  
これはアルゴリズムのコストを指定します  
[パスワードのハッシュ 定義済み定数](http://php.net/manual/ja/password.constants.php)

```php
$hashed = \Hash::make($plaintext, ['rounds' => 10]);
```
{/discussion}

{credit}
Editor and Translator:Yuuki Takezawa
{/credit}
