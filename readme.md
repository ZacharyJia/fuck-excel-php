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

然后在.env文件中配置数据库
参考配置如下:
```
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=fuckexcel
DB_USERNAME=
DB_PASSWORD=
```
PS:默认情况下mongodb在本地运行,且不需要权限验证。