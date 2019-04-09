# ip2region 的 PHP 客户端

## 说明
库文件`ip2region.db`生成参考：[ip2region](https://github.com/lionsoul2014/ip2region)

## 安装
```
composer require eddy/ip2region
```

## 使用方法
```php
//在本项目的 src/data 目录下已经生成好了一份 ip2region.db 文件，可以复制到你的项目直接使用。当然你也可以自己生成一份最新的文件。
$ip2region_db_file_location = 'ip2region.db';
$client = new eddy\Ip($ip2region_db_file_location);
$data = $client->memorySearch('220.168.85.64');
print_r($data);
```
