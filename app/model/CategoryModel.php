<?php


namespace app\model;


use app\core\Model;
use R;

class CategoryModel extends Model
{
    public array $attributes = [
        'title'=>'',
        'description'=>''
    ];

    public function getAllCategory(): array
    {
        return R::findAll('category');
    }

    public function getOneCategory($id){
        return R::findOne('category', 'id = ? LIMIT 1', [$id]);
    }

    public function getCategoryCount(): int
    {
        return R::count('category');
    }

    public function delete($id){
        if($category_del = R::load('category', $id)){
            R::trash($category_del);
            return true;
        }
    }

}