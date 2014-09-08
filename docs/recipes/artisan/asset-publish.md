---
Title:    公開されているパッケージを利用する
Topics:   artisan
Position: 26
---

{problem}
サードパーティのパッケージをアプリケーションにコピーしたい
{/problem}

{solution}
`php artisan asset:publish`コマンドが利用出来ます

```bash
$ php artisan asset:publish cool-package
```

サードパーティのパッケージをアプリケーションの`public/packages/cool-package`ディレクトリへコピーし、  
ウェブ上で利用することが出来ます
{/solution}

{discussion}
Laravel向けではないパッケージでは、  
パスを指定しなければならない可能性があります

```bash
$ php artisan asset:publish cool-package --path=/package/dir
```

ワークベンチのパッケージの場合、ワークベンチ名を指定してください。

```bash
$ php artisan asset:publish --bench=cool-package
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
