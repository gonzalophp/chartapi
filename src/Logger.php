<?php

namespace App;

class Logger
{
    static private $logger;

    static public function setLogger($logger)
    {
        self::$logger = $logger;
    }

    static function __callStatic($name, $arguments)
    {
        return call_user_func_array([self::$logger, $name], $arguments);
    }
}