---
Title:    Bladeのレイアウトを使って拡張する
Topics:   Blade
Code:     @extend, @section, @show, @yield
Id:       34
Position: 1
---

{problem}
いくつかのHTML要素を共通化させたい

すべてのHTMLページはいくつかの共通要素を持っています
ナビゲーションバー、コンテンツ領域、ヘッダーとフッターと云ったものです
これらを毎回コピーする事無く、レイアウトを利用してみましょう
{/problem}

{solution}
Bladeレイアウトを作成して利用します

### Step 1 - レイアウトを作成

`app/views/layouts/main.blade.php`を作成します

```html
<html>
  <head>
    {{-- 共通のヘッダー要素 --}}
  </head>
  <body>
    <div class="navigation">
      @section('navigation')
        <a href="/">Home</a>
        <a href="/contact">Contact</a>
      @show
    </div>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
```

#### Step 2 - レイアウトを利用する準備

```html
@extends('layouts.main')

@section('content')
  <p>
    コンテンツ
  </p>
@stop
```

_`@extends`を利用する場合、テンプレートの最初に記述しなければなりません_

#### 出力

レンダリングされたビューのHTMLは以下の様になります

```html
<html>
  <head>
  </head>
  <body>
    <div class="navigation">
        <a href="/">Home</a>
        <a href="/contact">Contact</a>
    </div>
    <div class="container">
  <p>
    コンテンツ
  </p>
    </div>
  </body>
</html>
```
{/solution}

{discussion}
すでに他のフレームワークでTwigやSmartyを利用していれば、
大体同じ様な動作をさせる事が出来ます。
{/discussion}
