<?php
namespace app\core;


use Exception;

class ErrorHelper{


    public function __construct(){
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }

        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline){
        $this->printError($errno, $errstr, $errfile, $errline);
        return true;
    }

    public function fatalErrorHandler(){
        $error = error_get_last();

        if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
            ob_end_clean();
            $this->printError($error['type'], $error['message'], $error['file'], $error['line']);
        }else{
            ob_end_flush();
        }
    }

    public function exceptionHandler(Exception $e){
        //'Uncaught exception'
        $this->printError('Exception', $e->getMessage(), $e->getFile(), $e->getFile(), $e->getCode());
    }

    protected function printError($errno, $errstr, $errfile, $errline, $response = 500){
        $this->errorLog($errno, $errstr, $errfile, $errline);
        http_response_code($response);
        if($response==404 && !DEBUG){
            require(ROOT.'public/error/404.php');
            die;
        }
        if(DEBUG){
            require(ROOT.'public/error/error.php');
        }else{
            require(ROOT.'public/error/noerr.php');
        }
        die;
    }

    public function errorLog($errno, $errstr, $errfile, $errline){
        $errMessage = " ".date('Y-m-d H-i-s'). " 
                                     \nError code: $errno. 
                                     \nError message: $errstr,  
                                     \nin file: $errfile, on line: $errline 
                                     \n<----------------------------------------------------------------------->\n";
        error_log($errMessage, 3, ROOT.'tmp/errors/errors.log');
    }
}