<?php


namespace app\model;


use app\core\Model;
use app\core\traits\updateUser;
use R;

class UserModel extends Model
{
    use updateUser;

    public array $attributes = [
        'login'=>'',
        'password'=>'',
        'email'=>'',
        'name'=>'',
        'activation'=>'',
        'role'=>'user',
        'avatar'=>''

    ];

    public array $validationRules = [
        "required"=>[
            ["login"],["password"],["email"],["name"],
        ],
        "email"=>[
            ["email"]
        ],
        "lengthMin"=>[
            ["password", 8], ["login", 3], ["name", 3]
        ]
    ];

    public function checkUnique()
    {
        $u = \R::findOne('users', 'login = ? OR email = ? LIMIT 1',
            [$this->attributes['login'], $this->attributes['email']]);
        if($u){
            if($u->login == $this->attributes['login']){
                $this->errors['unique'][] = "There is already a user with the same login.";
            }elseif($u->email == $this->attributes['email']){
                $this->errors['unique'][] = "There is already a user with the same email.";
            }
            return false;
        }else{
            return true;
        }
    }

    public function userLogin(){
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            $user = \R::findOne('users', 'login = ? LIMIT 1', [$login]);
            if($user){
                if(password_verify($password, $user['password'])){
                    foreach($user as $key => $value){
                        if($key!='password') $_SESSION['user'][$key] = $value;
                    }
                    return true;
                }else{
                    echo "false 1";
                }
            }else{
                echo "false 2";
            }
        }
        return false;
    }

    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['user']['role']=='admin');
    }

    public static function getUserInfo(){
        if(isset($_SESSION['user'])){
            foreach($_SESSION['user'] as $key => $value){
                $user[$key] = $value;
            }
            return $user;
        }
        return false;
    }

    public function getUsersCount(): int
    {
        return $count = R::count('users');
    }

    public function showAllUser(): array
    {
        return $users = R::findAll('users');
    }

    public function delete($id){
        if($userDel = R::load('users', $id)){
            R::trash($userDel);
            return true;
        }
    }

    public function getUser($id){
        return $user = R::load('users', $id);
    }

    public function ifIssetEmail($email){
        return $user_email = R::exec("SELECT * FROM users WHERE email = '$email'");
    }

    public function resetPassword($hash_code, $email, $time_expire){
        if(R::exec("INSERT INTO password_recovery(email, hash_code, time_expire) VALUES('$email', '$hash_code', $time_expire)")){
            return true;
        }
    }

    /* new */
    /*
    public function userLogin(){
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            $user = \R::findOne('users', 'login = ? LIMIT 1', [$login]);
            if($user){
                if(password_verify($password, $user['password'])){
                    foreach($user as $key => $value){
                        if($key!='password') $_SESSION['user'][$key] = $value;
                    }
                    return true;
                }
            }
        }
        return false;
    }
    */

}