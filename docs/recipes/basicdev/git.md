---
Title:    Gitを使ってプロジェクトを管理する
Topics:   Git, version control
Position: 2
---

{problem}
バージョン管理のシステムを導入していないので、プロジェクトのコードの変更履歴等が追えない
{/problem}

{solution}
[Git](http://git-scm.com/)を使ってみましょう

```bash
$ cd myapp
$ git init
```

準備はこれだけです。  
状態を確認してみましょう。

```bash
$ git status
```

変更したファイル、管理されていないファイル等が表示されます

```text
# On branch master
#
# Initial commit
#
# Untracked files:
#   (use "git add <file>..." to include in what will be committed)
#
#   .gitattributes
#   .gitignore
#   CONTRIBUTING.md
#   app/
#   artisan
#   bootstrap/
#   composer.json
#   phpunit.xml
#   public/
#   readme.md
#   server.php
#   util/
コミットされていない、管理されていないなどのファイルが表示されます。("git add"で追加していないファイル)
```

`composer.lock`を管理したい場合は、  
`.gitignore`を編集して該当の行を削除してください  
こうすることで`composer.lock`を管理に含める事が出来ます


`composer.lock` を管理下に含めている場合は、  
`composer install`後に、全てのバージョンが正しく導入されているか確認して下さい  
必要に応じて`composer update`で最新のものと入れ替えて下さい

まだメールアドレスや、アカウント名などを登録していなければ、登録してみましょう  
作業は簡単です。

```text
$ git config --global user.email "you@example.com"
$ git config --global user.name "Your Name"
```

ファイルをリポジトリに追加する場合は、2つのコマンドを実行します

```text
$ git add .
$ git commit -m "initial checkin"
```

最後に `status` コマンドで確認すると、  
何も表示されていないはずです

```text
$ git status
```

以下も参考にしてください

```text
# On branch master
nothing to commit, working directory clean
```
{/solution}

{discussion}
LaravelもGitを利用しています

Laravelはディレクトリ、ファイル構造を正しく保つため、隠しファイルを含んでいます  
`app/storage/logs`, `vendor`などは管理しないようにしています

ローカルで変更や更新を行い、gitフロー、githubフロー等に従って、  
ブランチを作成したり、プルリクエストなどを利用して、  
ただしくバージョン管理されている事を確認しましょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
