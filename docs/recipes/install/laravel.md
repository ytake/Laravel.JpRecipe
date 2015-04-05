---
Title:    Laravelのインストール方法
Topics:   CodeIgniter, Composer, installation, Zend Framework
Position: 8
---

{problem}
Laravelをインストールしたい

webサーバやPHPのインストール、mcryptの導入が済んでいる必要があります  
これからPHPフレームワークの中でもエレガントで、学習、実務にもベストなLaravelをインストールするには・・・
{/problem}

{solution}
今までのフレームワークのような、ダウンロードして、解凍して設置する  
インストール方法はありません
{/solution}

{discussion}
Laravel次の様な方法ではインストールしないでください

[CodeIgniter](http://ellislab.com/codeigniter)や  
[Zend Framework](http://framework.zend.com/)のように、  
ダウンロードして、解凍して設置するのはお勧めしません

その代わりに、composerを利用してLaravelのプロジェクトを作成します  
composerを利用することで、任意のLaravelのバージョンでプロジェクト作成をしたり、  
Laravelが依存しているパッケージなどを自動的に導入して、プロジェクトを構築します

簡単な一行のコマンドで作成が行われます  
[[Laravelプロジェクトの作成方法]] でLaraveのプロジェクトの作成方法が記述されています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
