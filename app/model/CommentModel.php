<?php


namespace app\model;


use app\core\Model;
use R;

class CommentModel extends Model
{
    public array $attributes = [
        'post_id'=>'',
        'comment'=>'',
        'user_id'=>''
    ];

    public function allUsersComments(){
        return $comments = R::findAll('comments');
    }

    // all comments
    public function commentsCount(): int
    {
        return $comments = R::count('comments');
    }

    public function getUserComments($user_id){
        return $userComment = R::findAll('comments','user_id = ?', [$user_id]);
    }

    // count for post
    public function getPostComments($post_id){
        return $commentsCount = R::count('comments', 'WHERE post_id = ?', [$post_id]);
    }

    // for user
    public function getUserCommentCount($user_id){
        return $commentCount = R::count('comments', 'user_id = ?', [$user_id]);
    }

    public function delete($id): bool
    {
        if($commentDel = R::load('comments', $id)){
            R::trash($commentDel);
            return true;
        }
    }
}