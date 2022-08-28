<?php


namespace app\model;


use app\core\Model;
use R;

class TagModel extends Model
{
    public array $attributes = [
        'title'=>'',
        'description'=>''
    ];


    public function addTags($postTags){
        $result = R::exec("INSERT INTO posts_tags(post_id,tag_id) VAlUE({$postTags['post_id']}, {$postTags['tag_id']})");
        return true;
    }


    public function getAllTags(){
        return R::findAll('tags');
    }


    public function getOneTag($id){
        return R::findOne('tags', "id = $id");
    }

    public function getTagsCount(): int
    {
        return R::count('tags');
    }

    public function delete($id){
        if($tag_del = R::load('tags', $id)){
            R::trash($tag_del);
            return true;
        }
    }


    public function getTagsCountWithPost($post_id){
        return R::count('tags',"INNER JOIN posts_tags ON posts_tags.post_id = $post_id AND posts_tags.tag_id = tags.id");
    }

    public static function getPostTag($post_id): ?array
    {
        return R::getAll("SELECT tags.title, tags.id FROM tags INNER JOIN posts_tags ON posts_tags.tag_id = tags.id WHERE posts_tags.post_id = $post_id");
    }

    public static function getPostsWithTag($tag_id): ?array
    {
        return R::getAll("SELECT posts.* FROM posts INNER JOIN posts_tags ON posts_tags.post_id = posts.id AND posts_tags.tag_id = $tag_id");
    }

}