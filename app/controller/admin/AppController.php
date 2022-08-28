<?php


namespace app\controller\admin;


use app\core\Controller;
use app\model\UserModel;
use R;

class AppController extends Controller
{
    public string $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);
        if(!UserModel::isAdmin() && $route['action']!='login'){
            redirect('/account/login');
        }
    }


}