<?php


namespace app\controller;


use app\core\Pagination;
use app\model\PostModel;
use R;

class PostController extends AppController
{
    public string $layout = 'default';

    public function like(){
        if(!empty($_SESSION['user'])){
            if(!empty($_GET['id'])){
                $postModel = new PostModel();
                $id = $_GET['id'];
                $postModel->setLike($id);
                redirect('/');
            }
        }else{
            redirect('/');
        }

    }

    public function dislike(){
        if(!empty($_SESSION['user'])){
            if(!empty($_GET['id'])){
                $postModel = new PostModel();
                $id = $_GET['id'];
                $postModel->setDislike($id);
                redirect('/');
            }
        }else{
            redirect('/');
        }
    }

    public function bookmark(){
        $bookmark = new PostModel();
        if(!empty($_SESSION['user'])){
            $userId = $_SESSION['user']['id'];
            $postId = $_GET['id'];
            if(!($res = R::findOne('posts_users_bookmarks', "user_id = $userId AND post_id = $postId LIMIT 1"))){
                $bookmark->saveBookmark($postId, $userId);
            }else{
                $bookmark->deleteBookmark($postId, $userId);
            }
            redirect('/user/main/bookmarks');
        }
    }

    public function images(){

    }


}