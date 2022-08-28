<?php


namespace app\controller\admin;

use app\model\CategoryModel;
use app\model\CommentModel;
use app\model\PostModel;

use app\model\TagModel;
use app\model\UserModel;
use R;

class PostsController extends AppController
{
    //public string $layout = 'admin';

    /*
    public $model;
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new PostModel();
    }
    */

    public function index(){
        $postModel = new PostModel();
        $userModel = new UserModel();
        // если LEFT JOIN, то NULL
        $posts = R::getAll("SELECT posts.*, category.title AS category_name FROM posts LEFT JOIN category ON posts.category_id = category.id");
        $this->setVars(compact('posts'));
    }

    public function store(){
        if(!empty($_POST)){
            $post = new PostModel();
            $tagModel = new TagModel();
            $data = $_POST;
            //debug($data);
            //exit();
            if($_FILES && $_FILES['title_img']['error']==UPLOAD_ERR_OK){
                $img_path = $post->addImage($_FILES['title_img']['name'], $_FILES['title_img']['tmp_name']);
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
            redirect('/admin/main/posts');
        }
    }

    public function create(){
        // баг
        new TagModel(); new CategoryModel();
        $tags = R::findAll('tags');
        $categories = R::findAll('category');
        $this->setVars(compact('tags', 'categories'));
    }

    // доделать
    public function edit(){
        new TagModel(); new CategoryModel();
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            // if tag isset
            $postTags = R::getAll("SELECT tags.id, tags.title, tags.description FROM tags JOIN posts_tags ON posts_tags.tag_id=tags.id WHERE posts_tags.post_id=$id");
            // else
            $noPostTags = R::getAll("SELECT tags.id, tags.title, tags.description FROM tags LEFT JOIN posts_tags ON posts_tags.tag_id=tags.id AND posts_tags.post_id=$id WHERE posts_tags.id IS NULL");
            $categories = R::findAll('category');
            $postModel = new PostModel();
            $post = $postModel->onePost($id);
            $this->setVars(compact('post', 'noPostTags', 'categories', 'postTags'));
        }
    }

    public function update(){
         if(!empty($_POST)){
             $data = $_POST;
             debug($data);
             die;
         }
    }

    public function delete(){
        if(!empty($_GET['delete_id'])){
            $postModel = new PostModel();
            $id = $_GET['delete_id'];
            $postModel->delete($id);
            redirect('/admin/posts');
        }
    }
}