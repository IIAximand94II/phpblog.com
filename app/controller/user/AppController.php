<?php
namespace app\controller\user;

use app\core\Controller;
use app\model\UserModel;

class AppController extends Controller
{

    public string $layout = 'default';

    /*
    public function __construct($route)
    {
        parent::__construct($route);

        //if(!UserModel::isAdmin() && $route['action']!='login'){
            //redirect('/user/login');
        //}
    }
    */

}