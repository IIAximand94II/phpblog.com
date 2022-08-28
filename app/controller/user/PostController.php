<?php
namespace app\controller\user;

use app\core\Model;
use app\lib\File;
use app\model\PostModel;
use app\model\TagModel;
use R;

class PostController extends AppController
{

    public $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new PostModel();
    }

    public function create(){
        $tags = R::findAll('tags');
        $categories = R::findAll('category');
        $this->setVars(compact('tags', 'categories'));
    }


    public function store(){
        if(!empty($_POST)){
            $post = new PostModel();
            $tagModel = new TagModel();
            $file = new File();
            $data = $_POST;
            if($_FILES && $_FILES['title_img']['error']==UPLOAD_ERR_OK){
                //$img_path = $post->addImage($_FILES['title_img']['name'], $_FILES['title_img']['tmp_name'];
                $title_img = '';
                $img_path = $file->upload($_FILES['title_img']['name'], $_FILES['title_img']['tmp_name'], 'img/posts/');
                //$data['title_img'] = $img_path;
                $data['title_img'] = $img_path;
            }
            $data['is_published'] = isset($data['is_published']) ? 'yes':'no';
            $data['user_id'] = $_SESSION['user']['id'];
            $post->load($data);
            $lastPost = $post->save('posts');
            $postTags = $data['tag'];
            foreach($postTags as $tag){
                $tags = ['post_id'=>$lastPost, 'tag_id'=>$tag];
                $tagModel->addTags($tags);
            }
            redirect('/user/main/posts');
        }
    }

    public function edit(){
        if(!empty($_GET)){
            $id = $_GET['id'];
            // if tag isset
            $postTags = R::getAll("SELECT tags.id, tags.title, tags.description FROM tags JOIN posts_tags ON posts_tags.tag_id=tags.id WHERE posts_tags.post_id=$id");
            // else
            $noPostTags = R::getAll("SELECT tags.id, tags.title, tags.description FROM tags LEFT JOIN posts_tags ON posts_tags.tag_id=tags.id AND posts_tags.post_id=$id WHERE posts_tags.id IS NULL");
            $categories = R::findAll('category');
            $post = R::findOne('posts', 'id = ?', [$id]);
            $this->setVars(compact('post', 'postTags', 'noPostTags', 'categories'));
        }
    }

    public function update(){
        if(!empty($_POST)){
            $post = new PostModel();
            $data = $_POST;
            $data['is_published'] = isset($data['is_published']) ? 'yes':'no';
            $post->load($data);
            $post->update($data['id'], 'posts');
            redirect('/user/main/posts');
        }

    }

    public function delete(){
        if(!empty($_GET)){
            $id = $_GET['id'];
            $this->model->delete($id);
            redirect('/user/main/posts');
        }
    }

}