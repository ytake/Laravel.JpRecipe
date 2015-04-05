---
Title:    デフォルトのRequestクラスを取得する
Topics:   Laravel4
Position: 27
---

{problem}
Laravelのリクエスト処理を構築しているクラスを知りたい  
このレシピはLaravel4のみ対応です
{/problem}

{solution}
`App::requestClass()`メソッドが利用できます

```php
echo "Request Class = ", \App::requestClass();
```
{/solution}

{discussion}
デフォルトのリクエストクラスを変更する場合も同じクラスを利用しますが、  
指定の方法は、少し異なります  
[[デフォルトのリクエストクラスを変更する]]を参考にしてください。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
