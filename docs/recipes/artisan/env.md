---
Title:    現在の環境を表示したい
Topics:   artisan, environment
Position: 5
---

{problem}
今のコンソール環境がどうなっているのか分からない

Webページが正しく表示されていても、コンソールの環境がWebページと異なっている場合があります
{/problem}

{solution}
`php artisan env`コマンドが利用できます

```bash
$ php artisan env
Current application environment: production
```
{/solution}

{discussion}
現在の環境には注意して下さい

環境設定で別のマシンのカスタム設定を設定することが出来ます  
大抵の場合、これは開発と本番で違ったデータベース設定やAPIアクセス先を設定するために用いられます  
現在の環境に細心の注意を払わないと、リクエストが別の環境の設定を元に処理されたり、  
コンソールリクエストも別の環境のものを使う可能性があります

使用する環境を決めるPHPコードの記述方法は [[実行している環境を確認]] を参照して下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp)
{/credit}
