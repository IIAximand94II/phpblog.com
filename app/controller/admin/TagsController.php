<?php


namespace app\controller\admin;

use app\core\Model;
use app\model\TagModel;
use R;

class TagsController extends AppController
{

    public function index(){
        // тут баг, понять почему
        $tagModel = new TagModel();
        $tags = R::getAll('SELECT tags.*, COUNT(posts_tags.post_id) AS posts_count FROM tags LEFT JOIN posts_tags ON posts_tags.tag_id = tags.id GROUP BY tags.id');
        $tagsCount = R::count('tags');
        $this->setVars(compact('tags', 'tagsCount'));
    }

    public function create(){

    }

    public function store(){
        $tagModel = new TagModel();
        if(!empty($_POST)){
            $data = $_POST;
            $tagModel->load($data);
            $tagModel->save('tags');
            redirect('/admin/tags');
        }
    }

    public function edit(){
        $tagModel = new TagModel();
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $tag = R::findOne('tags', "id = $id");
            $this->setVars(compact('tag'));
        }
    }

    public function delete(){
        $tagModel = new TagModel();
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $tagModel->delete($id);
            redirect('/admin/tags');
        }

    }

    public function update(){
        $tagModel = new TagModel();
        if(!empty($_POST)){
            $data = $_POST;
            $tagModel->load($data);
            $tagModel->update($data['id'], 'tags');
            redirect('/admin/tags');
        }
    }
}