<?php
namespace app\controller\user;

use app\core\Pagination;
use app\model\CommentModel;
use app\model\UserModel;
use app\model\PostModel;
use R;

class MainController extends AppController
{

    public function index(){
        $model = new PostModel();
        $user = UserModel::getUserInfo();
        $id = $user['id'];
        //echo $id;
        $userPosts = $model->getUserPosts($id);
        $postsCount = $model->getUserPostsCount($id);
        $this->setVars(compact('user', 'postsCount', 'userPosts', 'id'));
    }

    public function posts(){
        $model = new PostModel();
        $user = UserModel::getUserInfo();
        $id = $user['id'];
        //////////// pageno /////////
        $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
        $total = R::count('posts', "user_id = $id");
        $limit = 5;
        $pageno = new Pagination($page, $limit, $total);
        $start = $pageno->pagStart();
        $posts = R::findAll('posts', "user_id = $id LIMIT $start, $limit");
        /////////////////////////////
        $posts = $model->getUserPosts($id);
        $postsCount = $model->getUserPostsCount($id);
        $this->setVars(compact('user', 'postsCount', 'posts', 'pageno', 'start'));
    }

    public function comments(){
        $postModel = new PostModel();
        $commentModel = new CommentModel();
        $user = UserModel::getUserInfo();
        $id = $user['id'];
        //////////// pageno /////////
        $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
        $total = R::count('comments', "user_id = $id");
        $limit = 10;
        $pageno = new Pagination($page, $limit, $total);
        $start = $pageno->pagStart();
        $comments = R::findAll('comments', "user_id = $id LIMIT $start, $limit");
        /////////////////////////////
        $comments = $commentModel->getUserComments($id);
        $commentCount = $commentModel->getUserCommentCount($id);
        $postsCount = $postModel->getUserPostsCount($id);
        $this->setVars(compact('user', 'postsCount', 'comments', 'pageno', 'commentCount', 'start'));
    }

    public function bookmarks(){
        $model = new PostModel();
        $user = UserModel::getUserInfo();
        $id = $user['id'];
        //////////// pageno /////////
        $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
        $total = R::exec("SELECT posts.* FROM posts INNER JOIN posts_users_bookmarks ON posts.id = posts_users_bookmarks.post_id AND posts_users_bookmarks.user_id = $id");
        $limit = 5;
        $pageno = new Pagination($page, $limit, $total);
        $start = $pageno->pagStart();
        $posts = R::getAll(
            "SELECT posts.* FROM posts INNER JOIN posts_users_bookmarks ON posts.id = posts_users_bookmarks.post_id AND posts_users_bookmarks.user_id = $id LIMIT $start, $limit");
        /////////////////////////////
        $postsCount = $model->getUserPostsCount($id);
        $this->setVars(compact('user', 'postsCount', 'posts', 'pageno', 'start'));
    }
}