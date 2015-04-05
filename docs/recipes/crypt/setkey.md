---
Title:    暗号化キーを設定する
Topics:   encryption
Position: 3
---

{problem}
独自の暗号化キーを設定したい
{/problem}

{solution}
`Crypt::setKey()`を利用します

```php
\Crypt::setKey($key);
```
{/solution}

{discussion}
このキーは、後に使用する`Crypt::encrypt()`と`Crypt::decrypt()`に利用されます

ですが、これらが有効なのは現在のリクエスト中のみです

Laravelは自動で`Config::get('app.key')`をコールして、暗号化で利用します  
キーを変更した場合、  
`Crypt::decrypt()`が正しく複合化するのは、暗号化で利用したキーの場合のみとなります
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
