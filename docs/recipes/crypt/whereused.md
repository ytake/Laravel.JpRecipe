---
Title:    Laravelの暗号化について理解する
Topics:   cookies, encryption
Code:     -
Id:       110
Position: 6
---

{problem}
Laravelの暗号化について理解したい
{/problem}

{solution}
Laravelは3箇所でCryptパッケージを利用しています

1. キャッシュ キャッシュドライバーにデータベースをお使いの場合に、
   保存時に暗号化され、取得するときに複合化されます
2. cookie cookieの値は全て暗号化されてブラウザに送信されます。
   ブラウザから送信されたcookieはすべて複合化され利用されます
3. キュー ironキュードライバーを選択している場合に、
   全ての値は暗号化、複合化されて利用されます
{/solution}

{discussion}
[[リクエストのライフサイクルについて理解する]] も参考にしてください

cookieのミドルウェアとして扱われている事に注意してください
{/discussion}
