# PixPress

Peace WordPress -> PixPress

## framework

### robots.txt

* can be configured in `my-config.php`

# php localhost server

```bash

php -S localhost:4567

# launch with router as public/index.php
php -S localhost:4567 public/index.php

```

### Markdown Parser

* https://github.com/erusev/parsedown
  * last release: v1.7.4 / 2019

## Vue

* https://unpkg.com/browse/vue@3.5.12/dist/
* https://unpkg.com/vue@3.5.12/dist/vue.global.prod.js
* https://unpkg.com/vue@3.5.12/dist/vue.global.js


### Central data storage

* JS module can easily work as central data storage
* Also useful to store root vue app
  * (avoid provide/inject features)
* WARNING: vue root app is only ready after DOM is loaded
  * (use `mounted` hook to access root app)
  * import data store module and wait for mounted hook to store root app
  
### Documentation

* https://vuejs.org/guide/quick-start.html

#### Plugin

* https://vuejs.org/guide/reusability/plugins.html

#### Async Components

* https://vuejs.org/guide/components/async.html

## PHP

* Object Oriented programming
  * static methods and properties
* Templates


## SQLite

* https://www.sqlite.org/index.html
* https://www.php.net/manual/en/class.pdo.php

