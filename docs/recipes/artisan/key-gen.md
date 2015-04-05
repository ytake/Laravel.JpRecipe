---
Title:    アプリケーションキーの作成
Topics:   artisan
Position: 30
---

{problem}
新しいアプリケーションキーを作成したい
{/problem}

{solution}
`php artisan key:generate`コマンドが利用できます

```bash
$ php artisan key:generate
Application key [Idgz1PE3zO9iNc0E3oeH3CHDPX9MzZe3] set successfully.
```
{/solution}

{discussion}
これは無理に行う必要はありません

Laravelアプリケーションを初めて作成した時に、自動で`key:generate`が呼ばれます

なので、既にアプリケーションキーはされているため行う必要がないのです

もしコマンドを再び実行して変更する場合は、  
`\Hash::make()`でセーブされたパスワードはもう有効ではないということに注意して下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp)
{/credit}
