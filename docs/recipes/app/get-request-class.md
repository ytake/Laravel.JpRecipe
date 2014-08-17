---
Title:    デフォルトのRequestクラスを取得する
Topics:   -
Code:     App::requestClass()
Id:       209
Position: 27
---

{problem}
Laravelのリクエスト処理を構築しているクラスを知りたい
{/problem}

{solution}
`App::requestClass()`メソッドが利用できます

```php
echo "Request Class = ", \App::requestClass();
```
{/solution}

{discussion}
デフォルトのリクエストクラスを変更する場合も同じクラスを利用しますが、
指定の方法は、少し異なります。  
[[Changing the Default Request Class]]を参考にしてください。
{/discussion}
