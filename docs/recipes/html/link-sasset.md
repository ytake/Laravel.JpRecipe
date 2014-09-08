---
Title:    セキュアなassetHTMLリンクを生成する
Topics:   html
Position: 9
---

{problem}
アプリケーションのassetへセキュアなリンクを作成したい
{/problem}

{solution}
`HTML::linkSecureAsset()` メソッドを利用します

このメソッドは `HTML::secureLink()`と同じ引数を利用します([[セキュアなHTMLリンクを生成する]])
{/solution}

{discussion}
webページへのリンクと、assetへのリンクには少しだけ違いがあります

アプリケーションの設定によっては、  
Webページのパスに `index.php` が含まれる可能性がありますが、
assetには含まれません

assetのURLを生成する場合に、  
`HTML::linkSecureAsset()`はパスに`index.php`が含まれている場合はindex.phpを取り除きます

このメソッドは `HTML::linkAsset()` のラッパーですが、  
`HTML::linkAsset()` の第四引数に常に`true` を指定しています  
詳細は [[assetHTMLリンクを生成する]] をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
