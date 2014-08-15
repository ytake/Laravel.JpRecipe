---
Title:    認証で使用されるイベントを取得する
Topics:   -
Code:     Auth::getDispatcher()
Id:       231
Position: 36
---

{problem}
認証で使用されるイベントにアクセスしたい
{/problem}

{solution}
`Auth::getDispatcher()`メソッドを利用します

```php
$events = Auth::getDispatcher();
```
{/solution}

{discussion}
通常は`Event`ファサードを利用してアクセス、取得する事ができます

デフォルトでは、Laravelは`Event`ファサードと`Auth`ファサードの両方で  
同じイベント·ドライバを使用しています。  
アプリケーションで明示的にイベントディスパッチャーを設定しない場合は、  
`Event`ファサードを利用する事で簡単に取得する事ができます。
{/discussion}
