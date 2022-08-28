<?php
namespace app\core;

use app\core\View;

abstract class Controller
{
    public $route =[];
    public $view;
    public string $layout;
    public array $vars = [];

    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];

    }

    public function getView(){
        $viewObj = new View($this->route,$this->view,$this->layout);
        $viewObj->render($this->vars);
    }

    public function setVars($vars){
        $this->vars = $vars;
    }


    public function loadView($view, $vars=[]){
        extract($vars);
        require(ROOT."app/view/".$this->route['controller']).'/'.$view.'.php';
    }
}