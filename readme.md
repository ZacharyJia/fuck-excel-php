# FuckExcel

自定义表单系统。
基于Laravel和Mongodb

##搭建准备

* php >= 5.5.9
* php 拓展 mongodb  ( 以及 laravel 开发文档中 php 拓展 )
* mongdb
* composer
* apache or nignx
* git


##环境配置步骤


### mongdb准备

[mongdb下载](https://www.mongodb.com/download-center?jmp=nav#community) 

[php-mongdb依赖下载](http://pecl.php.net/package/mongodb)
ps:安装前 php_info() 检查php 版本号 线程安全  x86 or 64 配置方法自行查阅


###laravel环境配置

克隆仓库

``` git clone https://github.com/ZacharyJia/fuck-excel-php  fuck-excel```

进入仓库目录下 执行 

``` composer install ```

ps: linux 和 osx 下注意 storage 和 bootstrap/cache 目录应该是可写的

在项目目录下

``` cp .env.example .env```

```php artisan key:generate ```

在.env文件中设置数据库


config目录下

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