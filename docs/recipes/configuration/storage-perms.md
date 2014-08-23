---
Title:    storageディレクトリの実行権限を変更する
Topics:   Apache, configuration, Nginx, permissions
Code:     -
Id:       43
Position: 8
---

{problem}
Permission deniedエラーが発生している

Laravelが何かをファイルに書き出そうとしていて、原因が実行権限によるものだと疑ってみましょう  
この場合実行環境にもよりますが、アクセスしたときに何も表示されない真っ白な表示か、  
またはExceptionが投げられます  
{/problem}

{solution}
storageパスの所有者、または実行権限を変更して下さい

```bash
$ cd app/storage
$ sudo chmod 777 *
$ sudo chmod 666 */*
```
{/solution}

{discussion}
実行ユーザーの問題が多いです

たいていは、storageディレクトリに実行権限を与えるだけで解決します

**コンソールと、webサーバのユーザーが異なる**

これは通常の事ですが、  
コンソールとwebサーバの実行ユーザーが同じかどうかを確認しましょう

* [[Apache VirtualHostの作成]]
* [[Nginx VirtualHostの作成]]
{/discussion}
