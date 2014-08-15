---
Title:    認証に利用されているセッションストアを取得
Topics:   -
Code:     Auth::getSession()
Id:       237
Position: 42
---

{problem}
認証で利用されるセッションストアにアクセスしたい
{/problem}

{solution}
`Auth::getSession()`メソッドを利用します。

```php
$request = Auth::getSession();
```
{/solution}

{discussion}
通常は`Session`ファサードを用いてアクセスします。

デフォルトでは、Laravelは`Session`ファサードと`Auth`ファサードの両方で  
同じセッションストアを使用しています。  
アプリケーションで明示的にセッションストアの設定しない場合は、  
`Session`ファサードを利用する事で簡単に取得する事ができます。
{/discussion}
