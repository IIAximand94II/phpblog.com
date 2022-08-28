<?php
namespace app\model;

use app\core\Model;

use app\core\traits\validation;
use R;

class PostModel extends Model
{

    use validation;

    protected $table = 'posts';

    public array $attributes = [
        'title'=>'',
        'content'=>'',
        'title_img'=>'',
        'is_published'=>'',
        'category_id'=>'',
        'user_id' => ''
    ];

    /*
    public function addImage($image, $tmp){
        $res = $this->isImage($tmp);
        //$res = $this->isImage($image);
        if($res!=true){
            return false;
        }else{
            $file_name = time().'_'.$image;
            $file_path = POST_TITLE_IMG.$file_name;
            move_uploaded_file($tmp, $file_path);
            return $file_path;
        }
    }
    */
    public function updateTitleImg(){

    }

    // all users posts
    public function getUsersPostsCount(): int
    {
        return $count = R::count('posts');
    }

    // one user posts
    public function getUserPostsCount($userId): int
    {
        return $count = R::count('posts', 'user_id = ?',[$userId]);
    }

    public function getUserPosts($userId): array
    {
        return $posts = R::findAll('posts', 'user_id = ?', [$userId]);
    }

    public function getUserBookmarks($userId){
        return $bookmarks = R::findAll('posts_users_bookmarks', 'user_id = ?', [$userId]);
    }

    public function delete($id){
        if($postDel = R::load('posts', $id)){
            R::trash($postDel);
            return true;
        }
    }

    public function allPosts(): array
    {
        return $posts = R::findAll('posts');
    }

    public function onePost($id){
        return $post = R::findOne('posts', 'WHERE id = ? LIMIT 1', [$id]);
    }


    public function setLike($post_id){
        R::exec("UPDATE `posts` SET `rating` = `rating`+1 WHERE `id` = ?;", [$post_id]);
    }

    public function setDislike($post_id){
        R::exec("UPDATE `posts` SET `rating` = `rating`-1 WHERE `id` = ?;", [$post_id]);
    }


    public function saveBookmark($postId, $userId){
        $bookmark = R::exec("INSERT INTO posts_users_bookmarks(post_id, user_id) VALUES($postId, $userId)");
        return true;
    }

    public function deleteBookmark($postId, $userId){
        $bookmark = R::exec("DELETE FROM posts_users_bookmarks WHERE post_id = $postId AND user_id = $userId");
    }

    /*
    public function isImage($tmp){
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($tmp);

        if(!$file_type_result = in_array($detectedType, $allowedTypes)){
            return false;
        }else{
            return true;
        }
    }
    */
}