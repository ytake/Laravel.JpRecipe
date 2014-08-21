---
Title:    Subversionを使ってプロジェクトを管理する
Topics:   Subversion, version control
Code:     -
Id:       42
Position: 3
---

{problem}
バージョン管理のシステムを導入していないので、
プロジェクトのコードの変更履歴等が追えない。
{/problem}

{solution}
[Subversion](http://subversion.apache.org/)を使ってみましょう。

### Step 1 - 空のプロジェクトをインポート

```bash
$ cd myapp
$ svn import --depth=empty . svn://myrepo/projects/myapp \
> -m "Initial import"
```

### Step 2 - 既存のプロジェクトをチェックアウト

```bash
$ svn checkout svn://myrepo/projects/myapp .
```

### Step 3 - 不要ファイルの削除

```bash
$ rm .gitattributes
$ rm .gitignore
$ rm bootstrap/compiled.php
$ rm app/storage/*/*
```

### Step 4 - バージョン管理に含めない無視するディレクトリ、ファイルを追加する

```bash
$ svn propset svn:ignore vendor .
$ svn update
$ svn add a* b* c* C* p* r* s*
$ svn propset svn:ignore compiled.php bootstrap/
$ svn propset svn:ignore \* app/storage/cache/
$ svn propset svn:ignore \* app/storage/logs/
$ svn propset svn:ignore \* app/storage/meta/
$ svn propset svn:ignore \* app/storage/sessions/
$ svn propset svn:ignore \* app/storage/views/
```

### Step 5 - 管理化の全てを更新、コミットする

```bash
$ svn update
$ svn commit -m "Initial import"
```
{/solution}

{discussion}
紹介した方法は、たくさんあるやり方のうちの一つです

自分のプロジェクトにあった方法はほかにもあるかもしれません。  
他にもいくつか選択肢があります:

* Laravelプロジェクトを作成する前に、空のプロジェクトをSubversionに含める
* 簡単に利用する為に、GUIクライアントなどを導入する
* 最初に全てをインポートする

やり方は様々です。
{/discussion}
