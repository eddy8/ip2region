<?php

use PHPUnit\Framework\TestCase;

class IpTest extends TestCase
{
    public function testBasicFeature()
    {
        $file = __DIR__ . '/../src/data/ip2region.db';
        $data = [
            'country' => '中国',
            'province' => '湖南省',
            'city' => '长沙市',
            'isp' => '电信',
        ];
        $ip = '220.168.85.64';

        $obj = new eddy\Ip($file);
        $this->assertEquals($data, $obj->memorySearch($ip));

        $obj = new eddy\Ip($file);
        $this->assertEquals($data, $obj->binarySearch($ip));

        $obj = new eddy\Ip($file);
        $this->assertEquals($data, $obj->btreeSearch($ip));
    }
}