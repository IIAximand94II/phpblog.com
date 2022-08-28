<?php
namespace app\core;

class Registry
{
    public static $objects = [];
    private static $instance;

    protected function __construct(){
        require(ROOT.'app/config/config.php');
        foreach($config['components'] as $name => $namespace){
            self::$objects[$name] = new $namespace;
        }
    }

    public static function instance(){
        if(self::$instance===null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __get($name){
        if(is_object(self::$objects[$name])){
            return self::$objects[$name];
        }
    }

    public function __set($name, $class){
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $class;
        }
    }

    public function get(){
        echo "<pre>";
            var_dump(self::$objects);
        echo "</pre>";
    }

}
