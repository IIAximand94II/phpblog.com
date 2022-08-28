<?php


namespace app\core;


use app\core\traits\validation;
use PDO;
use R;
use Valitron\Validator;

abstract class Model
{


    protected $pdo;
    protected $table;
    public array $attributes = [];
    public array $validationRules = [];
    public array $errors = [];

    public function __construct(){
        $this->pdo = DB::instance();
    }

    public function load($data){
        foreach($this->attributes as $key => $value){
            if(isset($data[$key])){
                $this->attributes[$key]=$data[$key];
            }
        }
    }

    public function save($table){
        $dbQuery = R::dispense($table);
        foreach($this->attributes as $key => $value){
            $dbQuery->$key = $value;
        }
        return R::store($dbQuery);
    }

    public function update($id, $table){
        $param = '';
        $count = 0;

        foreach($this->attributes as $key => $value){
            if($count==0){
                $param .= $key."='$value'";
            }else if($value==''){
                $param .= '';
            } else{
                if(!is_numeric($value)){
                    $param .= ",$key = '$value'";
                }else{
                    $param .= ",$key = $value";
                }
            }
            $count++;
        }
        $sql = "UPDATE $table SET $param WHERE id = $id";
        R::exec($sql);
    }

    public function getAll(){
       return R::findAll("$this->table");
    }

    public function getOne($id){
        return R::findOne("$this->table","id=$id");
    }

    public function validate($data){
        $validator = new Validator($data);
        $validator->rules($this->validationRules);
        if($validator->validate()){
            return true;
        }
        $this->errors = $validator->errors();
    }


    public function getErrorsMessage(){
        $errorsBlock = "<ul class='errors'>";
            foreach($this->errors as $errors){
                foreach($errors as $error){
                    $errorsBlock .= "<li>$error</li>";
                }
            }
        $errorsBlock .= "</ul>";
        return $_SESSION['errors']=$errorsBlock;
    }

    public function getSuccessMessage($message){
        return $_SESSION['success'] = $message;
    }

    /*
    public function update($id, $params, $field, $row, $value){
        $sql = "UPDATE $this->table SET $row='$value' WHERE $field = $id";
        foreach($params as $key => $value){

        }
        return $this->pdo->execute($sql);
    }
    */

    // доделать валидацию, или полностью переделать
    /*
    public function validation($data){
        $login = trim($data['login']);
        $password = trim($data['password']);
        $confirmPassword = trim($data['confirmPassword']);
        $email = trim($data['email']);
        $name = trim($data['name']);

        if($login != '' && $password  != '' && $confirmPassword != '' && $email != '' && $name != ''){

            if($this->check_len(3, 50, $login) ||
               $this->check_len(3, 50, $name) ||
               ($this->check_len(8, 20, $password) && $this->check_len( 8, 20, $password))){

                if($password === $confirmPassword){
                    //return $data
                    return true;
                }
            }
        }else{
            return false;
        }
    }*/


    /*
    public function query($sql){
        return $this->pdo->execute($sql);
    }

    public function selectAll(){
        $sql = "SELECT * FROM $this->table";
        return $this->pdo->query($sql);
    }

    public function selectOne($id, $field='id'){
        $sql = "SELECT * FROM $this->table WHERE $field=$id";
        return $this->pdo->query($sql);
    }

    // доделать
    public function create($params=[]){
        $query = '';
        foreach($params as $key => $value){
            $query = $key." ";
        }
        $sql = '';
        return $this->pdo->execute($sql);
    }

    public function selectBySQL($sql){
        return $this->pdo->query($sql);
    }

    // доделать
    public function count($cols, $condition = ''){
        $sql = "SELECT COUNT($cols) FROM $this->table";
        if($condition!==''){
            $sql = $sql." WHERE $condition";
        }
        return $this->pdo->query($sql);
    }

    public function like($row, $str){
        $sql = "SELECT * FROM $this->table WHERE $row LIKE '%$str%'";
        return $this->pdo->query($sql);
    }
    */



}