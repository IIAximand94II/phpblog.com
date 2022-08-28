<?php


namespace app\controller;

use app\model\CommentModel;

class CommentController extends AppController
{
    public function create(){
        //debug($_SESSION['user']['id']);
        if(!empty($_POST)){
            $comment = new CommentModel();
            $data = $_POST;
            $data['user_id'] = $_SESSION['user']['id'];
            $comment->load($data);
            $comment->save('comments');
            redirect('/');
        }
    }

    public function like(){

    }

    public function dislike(){

    }

    public function delete(){

    }

    public function show(){

    }
}