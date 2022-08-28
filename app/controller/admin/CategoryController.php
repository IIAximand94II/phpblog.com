<?php


namespace app\controller\admin;


use app\model\CategoryModel;

class CategoryController extends AppController
{
    public function index(){
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAllCategory();
        $categoriesCount = $categoryModel->getCategoryCount();
        $this->setVars(compact('categories', 'categoriesCount'));
    }

    public function create(){

    }

    public function store(){
        if(!empty($_POST)){
            $data = $_POST;
            $categoryModel = new CategoryModel();
            $categoryModel->load($data);
            $categoryModel->save('category');
            redirect('/admin/category');
        }
    }

    public function edit(){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $categoryModel = new CategoryModel();
            $category = $categoryModel->getOneCategory($id);
            $this->setVars(compact('category'));
        }
    }

    public function update(){
        if(!empty($_POST)){
            $data = $_POST;
            $categoryModel = new CategoryModel();
            $categoryModel->load($data);
            $categoryModel->update($data['id'], 'category');
            redirect('/admin/category');
        }
    }

    public function delete(){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $categoryModel = new CategoryModel();
            $categoryModel->delete($id);
            redirect('/admin/category');
        }
    }
}