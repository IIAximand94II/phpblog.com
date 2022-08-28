<?php


namespace app\controller\admin;

use app\model\CategoryModel;
use app\model\CommentModel;
use app\model\PostModel;
use app\model\UserModel;
use R;

class MainController extends AppController
{
    public function index(){
        $postModel = new PostModel();
        $userModel = new UserModel();
        $commentModel = new CommentModel();
        $categoryModel = new CategoryModel();
        $categoriesCount = $categoryModel->getCategoryCount();
        $commentsCount = $commentModel->commentsCount();
        $allPosts = R::findAll('posts');
        $allUsers = R::findAll('users');
        $usersCount = $userModel->getUsersCount();
        $postsCount = $postModel->getUsersPostsCount();
        $this->setVars(compact('postsCount','usersCount', 'commentsCount', 'categoriesCount'));
    }

    public function logout(){
        if(isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'admin')){
            unset($_SESSION['user']);
            redirect('/');
        }
    }
}