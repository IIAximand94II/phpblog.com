<?php


namespace app\controller\admin;

use app\model\CommentModel;

class CommentsController extends AppController
{

    public function index(){
        $commentModel = new CommentModel();
        $commentsCount = $commentModel->commentsCount();
        $comments = $commentModel->allUsersComments();
        $this->setVars(compact('comments', 'commentsCount'));
    }

    public function delete(){
        if(!empty($_GET['id'])){
            $commentModel = new CommentModel();
            $id = $_GET['id'];
            $commentModel->delete($id);
            redirect('/admin/comments');
        }
    }
}