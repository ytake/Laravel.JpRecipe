---
Title:    assetHTMLリンクを生成する
Topics:   html
Position: 8
---

{problem}
アプリケーションのassetへのリンクを作成したい

一般的には`<a>...</a>`タグを利用しますが、これをLaravel流に利用してみましょう
_**assetとは、公開ディレクトリ配下に設置しているjs, css, img等を指します**_
{/problem}

{solution}
`HTML::linkAsset()`メソッドを利用します

このメソッドは `HTML::link()`と同じ引数を利用します([[HTMLリンクを生成する]]).
{/solution}

{discussion}
webページへのリンクと、assetへのリンクには少しだけ違いがあります

アプリケーションの設定によっては、
Webページのパスに `index.php` が含まれる可能性がありますが、
assetには含まれません

assetのURLを生成する場合に、
`HTML::linkAsset()`はパスに`index.php`が含まれている場合はindex.phpを取り除きます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
