<?php
include('app/lib/dev.php');
require('app/config/db.php');
require('path.php');
require('app/config/config.php');
require('app/lib/function.php');
require('vendor/autoload.php');

const TIME_ACTIVATION_LINK = 60;
const DEBUG = true;

use app\core\Router;
use app\core\App;

date_default_timezone_set('Europe/Moscow');

/**
 * Class autoloader
 */
/*
spl_autoload_register(function($class){
    $file = ROOT.str_replace('\\','/',$class).".php";
    if(file_exists($file)){
        require_once $file;
    }
});
*/

$query = $_SERVER['QUERY_STRING'];

new App;

//admin routers
Router::add('^admin$', ['controller'=>'Main', 'action'=>'index', 'prefix'=>'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix'=>'admin']);

//user routers

Router::add('^user$', ['controller'=>'Main', 'action'=>'index', 'prefix'=>'user']);
Router::add('^user/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix'=>'user']);

//defaults route
Router::add('^$', ['controller'=>'Main', 'action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::getPath($query);
