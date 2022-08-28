<?php


namespace app\lib;


use R;
use app\core\DB;
use app\model\CategoryModel;

class Menu{
    public $data;

    public string $templatePath;

    public function __construct(){
        $this->templatePath = ROOT.'app/view/widgets/menu.php';
        $this->data = R::findAll('category');
        $this->run();
    }


    public function run(){
        echo $this->getMenuHTML();
    }


    public function getMenuHTML(){
        $str = '';
        foreach($this->data as $item){
            $str .= $this->catToTemple($item, $this->templatePath);
        }
        return $str;
    }


    /////////////////////////////////////////////
    //ROOT.'app/view/widgets/menu.php'
    public function catToTemple($item, $path){
        ob_start();
        require("$path");
        return ob_get_clean();
    }

}
