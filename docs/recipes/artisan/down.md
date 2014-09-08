---
Title:    メンテナンスモードを作成したい
Topics:   artisan
Position: 9
---

{problem}
メンテナンスの間は、データベースの更新やその他の変更を行うためにユーザがアクセス出来ないようにしたい
{/problem}

{solution}
`php artisan down`コマンドが利用できます

このコマンドはメンテナンスモードフラグを設定します

```bash
$ php artisan down
```
{/solution}

{discussion}
メンテナンスモードの操作を忘れないようにしてください

[[メンテナンスモードのハンドラを登録する]]レシピを見て下さい

このコマンドが何をしているかというと、`app/storage/meta/down`に空のファイルを作成しています  
このファイルがメンテナンスモードのフラグになっています

Webフォーム内の複数のマシンでアプリケーションが動いている場合、  
各マシン上で`php artisan down`コマンドの実行が必要になります
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
