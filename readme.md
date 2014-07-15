## Laravel PHP Framework
[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

## Application basicPack
###for Laravel4.2
個人的に使用している構成にしたものです。  
デフォルトで[barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)がインストールされますので  
お使いのIDEでコード補完が可能です。

app/App配下をPSR-4としていますので、実装時にdump-autoloadは不要です。  
tab => スペース変換済み  
jquery, bootstrapはCDN利用とし、  
レイアウト対応用のベーシックなファイルが付属  
ご希望の方はGruntと一緒にご利用ください  
####include backbone.js / underscore.js / require.js

##利用方法
###install
composerは別途インストールしてください
```bash
$ composer update
# or
$ composer install
```
###permission
app/storage　の実行権限を忘れずに
```bash
$ chmod -R 777 app/storage
```
###grunt
public/packages　配下に設置されます。  
backbone.js不要の方はお使いのjavascript framework等に変更してください
```bash
$ npm install
$ grunt
```
## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
