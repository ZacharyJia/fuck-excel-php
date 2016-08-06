# FuckExcel

自定义表单系统。
基于Laravel和Mongodb


##环境配置


### mongdb

[mongdb下载](https://www.mongodb.com/download-center?jmp=nav#community) 

[php-mongdb依赖下载](http://pecl.php.net/package/mongodb)
ps:安装前 php_info() 检查php 版本号 线程安全  x86 or 64 配置方法自行查阅

克隆仓库

``` git clone https://github.com/ZacharyJia/fuck-excel-php  fuck-excel```

进入仓库目录下 执行 

``` composer require jenssegers/mongodb ```

出错的可以执行如下

``` composer require jenssegers/mongodb --ignore-platform-reqs``` 忽略版本差异

###laravel环境配置


目录下

``` cp .env.example .env```

```php artisan key:generate ```

在.env文件中设置数据库


config目录下

配置app.php

在providers中添加

``` Jenssegers\Mongodb\MongodbServiceProvider::class, ```

在aliases出添加如下代码

``` 'Mongo'     => Jenssegers\Mongodb\MongodbServiceProvider::class, ```

配置database.php

``` 'default' => env('DB_CONNECTIOND', 'mongodb') ```

```
'mongodb' => [ 
            'driver'   => 'mongodb',
            'host'     => 'localhost',
            'port'     => 27017,
            'database' => 'test',
            'username' => '', 
            'password' => '', 
        ],
```
配置完成，有问题请google