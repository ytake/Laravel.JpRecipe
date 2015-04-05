---
Title:    Composerをインストールする
Topics:   Composer, installation
Position: 4
---

{problem}
Composerをインストールしたい

Laravelの依存ライブラリなどのパッケージ管理にComposerが利用されています  
お使いの環境にインストールされていない場合は、インストールしてみましょう
{/problem}

{solution}
インストールはとても簡単です

```bash
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

インストール後にバージョンを確認してみましょう

```bash
$ composer --version
```

大体は次の様に出力されます

```text
Composer version d3ff302194a905be90136fd5a29436a42714e377
```

{/solution}

{discussion}
ComposerはPHPのための依存解決ツールです

ComposerはPHPのプロジェクトで必要なライブラリを自動でインストールし、  
プロジェクトに必要なものを自動で構成します

紹介した導入方法は、主にubuntuなどのLinuxを対象としています  
それ以外のOSの場合のインストール方法は(windowsなど)  
[getcomposer.org](http://getcomposer.org/doc/00-intro.md) に記述されている方法に沿って導入してください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
