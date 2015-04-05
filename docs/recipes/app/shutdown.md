---
Title:    Shutdownコールバック処理を実行する
Topics:   callbacks, Laravel4
Position: 9
---

{problem}
直接Shutdownコールバック処理を実行したい

Laravelアプリケーションが予期せぬエラーで終了した場合等に、  
登録してあるShutdownコールバックを任意で使用したい  
このレシピはLaravel4のみ対応です
{/problem}

{solution}
`App::shutdown()`を利用します

引数等を指定せずに`App::shutdown()`と記述する事で、  
登録してある処理を実行させる事が出来ます

```php
// 登録済みのShutdownコールバック実行
\App::shutdown();
```
{/solution}

{discussion}
これは標準的なものではありません

これを実行する事で、リクエストのライフサイクルは標準的な流れで処理されません  
また、`App::shutdown()`は、アプリケーションが終了していない場合でも、  
任意に実行出来る事に注意して下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
