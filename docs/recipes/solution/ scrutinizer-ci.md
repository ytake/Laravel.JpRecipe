---
Title:    scrutinizerCIを使って継続的インテグレーションと静的解析
Topics:   solution, scrutinizerCI
Position: 2
---

{problem}
Laravelプロジェクトを静的解析と継続的インテグレーション、コードカバレッジも取得したい
{/problem}

{solution}
ソースコードの静的解析に定評のあるscrutinizerCIを利用してみましょう  
[scrutinizer CI](https://scrutinizer-ci.com/)  
GitHub、またはBitbucketを利用していれば、どなたでも利用できます  
いずれかのアカウントをお持ちであれば、  
そのアカウントを使ってscrutinizerCIをログインをして、  
利用したいリポジトリを選択するだけです  
次にそれぞれの機能を利用するには、  
リポジトリに`.scrutinizer.yml`を設置する必要がありますが、  
webブラウザ上から設定する事も出来ます  

静的解析自体はすぐに利用できますので、まずは自身のプロジェクトで利用してみましょう！

リポジトリ登録後に、解析が始まります  

このサイトを解析すると次の様な結果となりました  

![Result1](/images/scrutinizerCI1.png)  
![Result2](/images/scrutinizerCI2.png)  
コードの解析結果一覧や、  
問題のあるコードや、バグ発生の可能性があるコードを解析して通知してくれます  

必要に応じて利用したい機能をymlファイルで指定します
```text
tools:
  external_code_coverage: true
  checks:
    php:
      code_rating: true
      duplication: true
```

様々な機能が用意されており、publicなリポジトリは無料で利用する事が出来ますので、  
自身のサービス改善、または品質向上に役立ててみてはいかがでしょうか？
{/solution}

{discussion}

githubなどで利用できるバッジもあります  
パッケージなどの品質表示として利用してみましょう！
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
