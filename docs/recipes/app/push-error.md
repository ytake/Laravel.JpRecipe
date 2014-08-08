---
Title:    最終的なエラーハンドラ登録
Topics:   -
Code:     App::error(), App::pushError()
Id:       205
Position: 23
---

{problem}
色々エラー処理を登録しているが、そのなかでも任意のところだけでエラー処理を行いたい
{/problem}

{solution}
`App:pushError()`メソッドを利用します

これは処理のスタック中に追加して、優先して実行する様にします

```php
App::pushError(function($exception) {
    die('ERROR: '.$exception->getMessage());
});
```
{/solution}

{discussion}
これは、`App::error()`とほぼ同等です。

違いは、`App::error()`よりも`App:pushError()`がハンドラーとして利用されます  
こちらを参照してください[[Registering an Error Handler]].
{/discussion}
