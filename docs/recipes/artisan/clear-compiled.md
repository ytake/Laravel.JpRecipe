---
Title:    コンパイルされたクラスをクリアしたい
Topics:   artisan
Code:     -
Id:       59
Position: 7
---

{problem}
コンパイルされたクラスをクリアしたい。

ご存知の通り、Laravelはクラスローディングの最適化や、テストのために最適化をクリアすることができます。
{/problem}

{solution}
`php artisan clear-compiled`コマンドが利用できます。

```bash
$ php artisan clear-compiled
```
{/solution}

{discussion}
このコマンドは２つのファイルを削除します。

1. `bootstrap/compiled.php`、このファイルは最適化されたクラスを生成するためのファイルになります。
2. `app/storage/meta/services.json`、このファイルはアプリケーションで使用されているサービスプロバイダの読み込みを最適化するためのファイルになります。

[[Optimizing the Framework for Better Performance]]の項目も見て下さい。
{/discussion}
