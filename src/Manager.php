<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 11:41:56
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-10 22:39:50
 * 
 */

namespace JuneSwoole\Skeleton;

use JuneSwoole\Command\Container;

class Manager
{

    function __construct()
    {
        defined('SWOOLE_VERSION') or define('SWOOLE_VERSION', intval(phpversion('swoole')));
        defined('JUNESWOOLE_SERVER') or define('JUNESWOOLE_SERVER', 1);
        defined('JUNESWOOLE_WEB_SERVER') or define('JUNESWOOLE_WEB_SERVER', 2);
        defined('JUNESWOOLE_WEBSOCKET_SERVER') or define('JUNESWOOLE_WEBSOCKET_SERVER', 3);
        defined('JUNESWOOLE_REDIS_SERVER') or define('JUNESWOOLE_REDIS_SERVER', 4);
        Container::getInstance()->initialize();
    }

    public static function exec(array $args): ?string
    {
        $command = array_shift($args);
        if (empty($command) || !Container::getInstance()->has($command)) {
            $command = 'Help';
        }
        return Container::getInstance()->runCommand($command, $args);
    }
}
