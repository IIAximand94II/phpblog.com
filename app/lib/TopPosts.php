<?php

namespace app\lib;

use app\lib\Menu;
use R;

class TopPosts extends Menu
{

    public function __construct(){
        $this->data = R::findAll('posts', 'rating > 0 ORDER BY rating DESC LIMIT 3');
        $this->templatePath = ROOT.'app/view/widgets/topPosts.php';
        $this->run();
    }

}