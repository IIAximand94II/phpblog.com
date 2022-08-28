<?php

namespace app\core\traits;

use R;

trait updateUser
{

    public function updateLogin($id, $login){
        R::exec("UPDATE users SET login = '$login' WHERE users.id = $id");
    }

    public function updateName($id, $name){
        R::exec("UPDATE users SET name = '$name' WHERE users.id = $id");
        //return true;
    }

    public function updateEmail($id, $email){
        R::exec("UPDATE users SET email = '$email' WHERE users.id = $id");
    }

    public function updateAvatar($id, $avatar){

    }

    public function updatePassword($id, $passdata){

    }
}