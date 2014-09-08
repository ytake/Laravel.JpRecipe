---
Title:    固有のconfig値を設定する
Topics:   configuration
Position: 4
---

{problem}
configにオプションを設定したい

この場合、永続的に使える設定値ではなく、  
その時だけ有効な設定値として利用する事ができます
{/problem}

{solution}
`Config::set()`を利用します

たとえば、今、sessionドライバーを配列のドライバーに変更したいとしましょう

```php
\Config::set('session.driver', 'array');
```

こうすると、現在のリクエスト内のみ、  
`Config::get('session.driver')`をコールすると、`array`が返却されます
{/solution}

{discussion}
これは、現在のリクエストに影響を与えます

永続的に値を変更させたい場合は、  
適切なconfigファイルを作成して、仕様等にあわせて編集して利用してください。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
