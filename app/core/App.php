<?php


namespace app\core;

use app\core\Registry;

class App
{
    public static $app;

    public function __construct(){
        self::$app = Registry::instance();
        session_start();
        new ErrorHelper();
    }
}