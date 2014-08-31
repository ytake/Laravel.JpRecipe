---
Title:    フォームで利用するセッションクラスを取得する
Topics:   forms
Code:     Form::getSessionStore()
Id:       178
Position: 27
---

{problem}
`Form`ファサードが利用するセッションクラスにアクセスしたい
{/problem}

{solution}
`Form::getSessionStore()`メソッドを利用します

```php
$session = \Form::getSessionStore();
```
{/solution}

{discussion}
通常、このメソッドはあまり必要とされません

セッションは`Session`ファサードを利用して直接アクセスする事が出来ます
ですが、複雑なアプリケーションを開発している場合や、
それぞれの機能毎に利用しているセッションクラスが異なる場合等のために
このメソッドが用意されています
{/discussion}
