<?php

namespace eddy;

class Ip
{
    private $obj;

    public function __construct($file)
    {
        if (!file_exists($file)) {
            throw new \InvalidArgumentException("{$file} 文件不存在");
        }

        $this->obj = new Ip2Region($file);
    }

    public function __call($name, $arguments)
    {
        if (!in_array($name, ['memorySearch', 'binarySearch', 'btreeSearch'], true)) {
            throw new \InvalidArgumentException("{$name} 方法不存在");
        }

        $ip = trim($arguments[0]);
        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            throw new \InvalidArgumentException("{$arguments[0]} 无效IP地址");
        }

        $result = $this->obj->$name($ip);
        $data = explode('|', $result['region']);
        return [
            'country' => strval($data[0]),
            'province' => strval($data[2]),
            'city' => strval($data[3]),
            'isp' => strval($data[4]),
        ];
    }

    public function __destruct()
    {
        unset($this->obj);
    }
}
