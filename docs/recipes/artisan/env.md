---
Title:    現在の環境を表示したい
Topics:   artisan, environment
Code:     -
Id:       6
Position: 5
---

{problem}
今のコンソール環境がどうなっているのか分からない。

Webページが正しく表示されていても、コンソールの環境がWebページと異なっている場合があります。
{/problem}

{solution}
`php artisan env`コマンドが利用できます。

{text}
$ php artisan env
Current application environment: production
{/text}
{/solution}

{discussion}
現在の環境には注意して下さい。

環境設定で別のマシンのカスタム設定を設定することが出来ます。
大抵の場合、これは開発と本番で違ったデータベース設定やAPIアクセス先を設定するために用いられます。
現在の環境に細心の注意を払わないと、リクエストが別の環境の設定を元に処理されたり、コンソールリクエストも別の環境のものを使う可能性があります。

使用する環境を決めるPHPコードの記述方法は [[Checking Your Environment]] を参照して下さい。
{/discussion}
