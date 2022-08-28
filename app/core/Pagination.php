<?php


namespace app\core;


use JetBrains\PhpStorm\Pure;

class Pagination
{

    public $limit;
    public $total;
    public $totalPages;
    public $carrenPage;
    public $uri;



    public function __construct($page, $limit, $total){

        $this->limit = $limit;
        $this->total = $total;
        $this->totalPages = $this->getPageCount();
        $this->carrenPage = $this->currenPage($page);
        $this->uri = $this->getParameters();
    }


    #[Pure] public function __toString():string{
        return $this->getHTML();
    }

    public function getPageCount(){
        return ceil($this->total / $this->limit) ? : 1;
    }

    public function currenPage($page){
        if(!$page || $page<1){
            $page = 1;
        }
        if($page > $this->totalPages){
            $page = $this->totalPages;
        }
        return $page;
    }

    public function pagStart(){
        return ($this->carrenPage - 1) * $this->limit;
    }

    public function getParameters(){
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        //debug($url);
        $uri = $url[0].'?';
        if(isset($url[1]) && $url[1]!=''){
            $params = explode('&', $url[1]);
            foreach($params as $param){
                if(!preg_match("/page=/", $param)) $uri .= "{$param}&amp;";
            }
        }

        return $uri;
    }

    public function getHTML(): string
    {
        $backPage = null;
        $forwardPage = null;
        $startPage = null;
        $endPage = null;
        // left | right
        $pageTwoLeft = null;
        $pageOneLeft = null;
        $pageTwoRight = null;
        $pageOneRight = null;

        if($this->carrenPage > 1){
            $backPage = "<li class='page-item'><a class='page-link' href='{$this->uri}page=".($this->carrenPage - 1)."'>&lt;</a></li>";
        }
        if($this->carrenPage < $this->totalPages){
            $forwardPage = "<li class='page-item'><a class='page-link' href='{$this->uri}page=".($this->carrenPage + 1)."'>&gt;</a></li>";
        }
        if($this->carrenPage > 3){
            $startPage = "<li class='page-item'><a class='page-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }
        if($this->carrenPage < ($this->totalPages -2)){
            $endPage = "<li class='page-item'><a class='page-link' href='{$this->uri}page=".$this->totalPages."'>&raquo;</a></li>";
        }
        if($this->carrenPage - 2 > 0){
            $pageTwoLeft = "<li class='page-item'><a class='page-link' href='{$this->uri}page=".($this->totalPages - 2)."'>".($this->totalPages - 2)."</a></li>";
        }
        if($this->carrenPage - 1 > 0){
            $pageOneLeft = "<li class='page-item'><a class='page-link' href='{$this->uri}page=".($this->totalPages - 1)."'>".($this->totalPages - 1)."</a></li>";
        }
        if($this->carrenPage + 1 <= $this->totalPages){
            $pageOneRight = "<li class='page-item'><a class='page-link' href='{$this->uri}page=".($this->totalPages + 1)."'>".($this->totalPages + 1)."</a></li>";
        }
        if($this->carrenPage + 2 <= $this->totalPages){
            $pageTwoRight = "<li class='page-item'><a class='page-link' href='{$this->uri}page=".($this->totalPages + 2)."'>".($this->totalPages + 2)."</a></li>";
        }

        return "<nav aria-label='Page navigation example'><ul class='pagination'>".$startPage.$backPage.$pageTwoLeft.$pageOneLeft."<li class='page-item active'><a>".$this->carrenPage."</a></li>".$pageOneRight.$pageTwoRight.$forwardPage.$endPage."</ul></nav>";
    }
}