---
Title:    認証ユーザープロバイダーの取得
Topics:   -
Position: 40
---

{problem}
認証で利用されるユーザープロバイダーにアクセスしたい
{/problem}

{solution}
`Auth::getProvider()`メソッドを利用します

```php
$provider = Auth::getProvider();
```
{/solution}

{discussion}
プロバイダーは、認証の設定などのコンフィグに基づいて利用されます

`app/config/auth.php`で設定したドライバーのプロバイダーになっているはずです  
[[認証のドライバーを変更する]]も参考にしてください

具体的には、デフォルトで用意されている`database`をドライバーとして利用する場合、  
`Illuminate\Auth\DatabaseUserProvider`がプロバイダーとなり、  
`eloquent`を選択した場合は、  
`Illuminate\Auth\EloquentUserProvider`がプロバイダーとなります

独自の認証ドライバを利用する場合は、それに応じた独自のプロバイダーとなります
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
