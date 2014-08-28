---
Title:    VirtualBoxをインストールする
Topics:   installation, VirtualBox
Code:     -
Id:       15
Position: 1
---

{problem}
仮想仮想が必要です

Vagrantを使うには、仮想環境が必要です
Vagrant導入前にVirtualBoxをインストールしてみましょう
{/problem}

{solution}
VirtualBoxをインストールします

#### Step 1 - VirtualBoxのwebサイト

VirtualBoxのwebページ [downloads](https://www.virtualbox.org/wiki/Downloads) にアクセスしてください

![VirtualBox Download Page](/images/virtualbox.jpg)

#### Step 2 - ダウンロードとインストール

利用しているOSにあったパッケージを探してダウンロードします
ダウンロード後はそのままインストールします
VirtualBoxは、Windows、Mac OSX、Linux用のインストーラーを提供しています

#### Step 3 - 動作確認

コンソールで、`virtualbox`コマンドを実行して動作確認をします

```bash
$ virtualbox
```

_(Windowsの場合は、**Oracle VM VirtualBox** から起動出来ます)_
{/solution}

{discussion}
VirtualBoxって何ですか？

VirtualBoxは、クロスプラットフォームの仮想化アプリケーションです
同時に（複数の仮想マシン内）複数のオペレーティングシステムを実行できるアプリケーションです

VirtualBoxを使用して、OSの新バージョンをテストしたり、
特定のOSのみでしか動作しないもののテスト等に最適です

{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
