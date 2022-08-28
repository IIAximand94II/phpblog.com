<?php


namespace app\controller\admin;

use app\model\CommentModel;
use app\model\PostModel;
use app\model\UserModel;

class UsersController extends AppController
{
    public function index(){
        $model = new UserModel();
        $users = $model->showAllUser();
        $this->setVars(compact('users'));
    }

    public function create(){
        $userModel = new UserModel();
        if(!empty($_POST)){
            $data = $_POST;
            $data['role'] = isset($data['role']) ? 'admin':'user';
            //debug($data);
            //die;
            $userModel->load($data);
            $userModel->attributes['password'] = password_hash($userModel->attributes['password'], PASSWORD_DEFAULT);
            $userModel->save('users');
            redirect('/admin/users');
        }
    }

    public function delete(){
        $userModel = new UserModel();
        if(!empty($_GET['delete_id'])){
            $id = $_GET['delete_id'];
            $user = $userModel->delete($id);
            redirect('/admin/users/');
        }
    }

    public function edit(){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $userModel = new UserModel();
            $user = $userModel->getUser($id);
            $this->setVars(compact('user'));
        }
    }

    public function update(){

    }

    public function profile(){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $userModel = new UserModel();
            $postModel = new PostModel();
            $commentModel = new CommentModel();
            $commentsCount = $commentModel->getUserCommentCount($id);
            $comments = $commentModel->getUserComments($id);
            $userPosts = $postModel->getUserPosts($id);
            $postsCount = $postModel->getUserPostsCount($id);
            $user = $userModel->getUser($id);
            $this->setVars(compact('user','userPosts','postsCount', 'commentsCount', 'comments'));
        }
    }
}