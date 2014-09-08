---
Title:    認証リクエストのインスタンスを取得
Topics:   -
Position: 38
---

{problem}
認証で利用されるリクエストのインスタンスにアクセスしたい
{/problem}

{solution}
`Auth::getRequest()`メソッドを利用します

```php
$request = Auth::getRequest();
```
{/solution}

{discussion}
通常は`Request`ファサードを用いてアクセスします

デフォルトでは、Laravelは`Request`ファサードと`Auth`ファサードの両方で  
同じリクエストを使用しています  
アプリケーションで明示的にリクエストの設定しない場合は、  
`Request`ファサードを利用する事で簡単に取得する事ができます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
