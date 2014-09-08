---
Title:    暗号化のアルゴリズムを設定する
Topics:   encryption
Position: 4
---

{problem}
暗号化に利用するアルゴリズムを変更したい
{/problem}

{solution}
`Crypt::setCipher()`を利用します

```php
\Crypt::setCipher($new_cipher);
```
{/solution}

{discussion}
現在、デフォルトで`rijndael-128`が利用されています

`mcrypt_list_algorithms()`で使用可能な暗号化アルゴリズムを取得できます

* cast-128
* gost
* rijndael-128
* twofish
* arcfour
* cast-256
* loki97
* rijndael-192
* saferplus
* wake
* blowfish-compat
* des
* rijndael-256

これらのアルゴリズムは、`Crypt::encrypt()`, `Crypt::decrypt()`に利用されます

ただし、このメソッドをコールした場合に有効になるのは、  
現在のリクエスト処理の間のみです

永続的に変更する場合は、  
`app/config/app.php`内の'cipher'の値を任意のアルゴリズムに変更してください。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
