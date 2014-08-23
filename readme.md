## jp recipe
[![Build Status](https://travis-ci.org/ytake/Laravel.JpRecipe.svg?branch=translate-app)](https://travis-ci.org/ytake/Laravel.JpRecipe)
[![Coverage Status](https://coveralls.io/repos/ytake/Laravel.JpRecipe/badge.png?branch=translate-app)](https://coveralls.io/r/ytake/Laravel.JpRecipe?branch=translate-app)
[![Dependency Status](https://www.versioneye.com/user/projects/53e18735151b35f8b70002ee/badge.svg)](https://www.versioneye.com/user/projects/53e18735151b35f8b70002ee)
###for dev
generate ide-helper
```bash
$ php artisan ide-helper:generate
```

develop
```bash
$ php artisan migrate
$ php artisan db:seed
```

Grunt
```bash
$ npm install
$ grunt
```

##URI
###recipes API
* [レシピ一覧取得]GET: /api/v1/recipe (application/json)  
* [レシピ取得]GET: /api/v1/recipe/{recipe_id} (application/json)  
* [レシピ一覧取得]GET: /api/v1/recipe?format=hal (application/hal+json)  
* [レシピ取得]GET: /api/v1/recipe/{recipe_id}?format=hal (application/hal+json)  

###XML
* [サイトマップ]GET: /sitemap.xml (application/xml; charset=UTF-8)
* [Atom Feed]GET: /feed (application/atom+xml)  
* [RSS Feed]GET: /feed/rss (application/rss+xml; charset=utf-8)

##Artisan
###レシピスキャン
```bash
$ php artisan jp-recipe:add
```

###アクセスユーザー追加
```bash
$ php artisan jp-recipe:add-allow-account [username]
```
