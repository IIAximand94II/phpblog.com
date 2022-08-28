<?php


namespace app\controller;


use app\core\Model;
use app\core\traits\updateUser;
use app\lib\File;
use app\model\UserModel;
use R;
use app\lib\Mail;

class AccountController extends AppController
{

    public string $layout = 'default';

    public $errors = [];

    public function index(){

    }

    // переделать!
    public function registration(){
        if(!empty($_POST)){
            $user = new UserModel();
            $file = new File();
            $data = $_POST;

            $user->load($data);

            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrorsMessage();
                redirect();
            }else{

                /////////////////////////////// activation message  //////////////////////////////
                $email = $data['email'];
                $activation=md5($email.time());
                $data['activation'] = $activation;
                Mail::verificationMail($email, $activation);
                //////////////////////////////// activation message end  ////////////////////////
                ///////////////////////////////  avatar  /////////////////////////////////////
                if($_FILES && $_FILES['avatar']['error']==UPLOAD_ERR_OK){
                    $file_name = time().$_FILES['avatar']['name'];
                    $file->upload($_FILES['avatar']['name'], $_FILES['avatar']['tmp_name'], 'img/user_avatar/');
                    $data['avatar'] = $file_name;
                }
                /////////////////////////////// avatar end  //////////////////////////////////
                //update or del
                $user->load($data);
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                $user->save('users');
                //$user->getSuccessMessage("You success complete!");
                redirect('/account/verification');
            }
        }
    }

    // переделать!
    public function activation(){
        if(!empty($_GET['code'])){
            //debug($_GET);
            //exit();
            $code=($_GET['code']);
            $query = R::exec("SELECT id FROM users WHERE activation = '$code'");
            if($query){
                $count = R::exec("SELECT id FROM users WHERE activation = '$code' AND verification = '0'");
                if($count){
                    $verification = R::exec("UPDATE users SET verification = '1' WHERE activation = '$code'");
                    redirect('/account/login');
                }
            }
        }
        redirect('/main');

    }


    public function login(){
        $menu = $this->navMenu;
        //$this->setVars(compact('menu'));

        if(!empty($_POST)){
            $user = new UserModel();
            if($user->userLogin() && UserModel::isAdmin()==false){
                redirect('/user/main');
            }else{
                redirect('/main/index');
            }
        }
    }

    public function logout(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/main/index');
    }

    public function edit(){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $userModel = new UserModel();
            $user = $userModel->getUser($id);
            $this->setVars(compact('user'));
        }
    }

    /////////
    public function update(){
        if(!empty($_POST)){
            $user = new UserModel();
            $data = $_POST;
            $user->load($data);
            $user->update($user['id'], 'users');
            redirect('/user/main');
        }
    }

    public function updateName(){
        $user = new UserModel();
        if(!empty($_POST)){
            $id = $_POST['id'];
            $data = $_POST['name'];
            $user->updateName($id, $data);
            redirect('/user/main');
        }
    }

    public function updateLogin(){
        $user = new UserModel();
        if(!empty($_POST)){
            $id = $_POST['id'];
            $data = $_POST['login'];
            $user->updateLogin($id, $data);
            redirect('/user/main');
        }
    }

    public function updateEmail(){
        $user = new UserModel();
        if(!empty($_POST)){
            $id = $_POST['id'];
            $data = $_POST['email'];
            $user->updateEmail($id, $data);
            redirect('/user/main');
        }
    }

    public function updateAvatar(){
        if(isset($_POST) && $_FILES && $_FILES['new_avatar']['error']==UPLOAD_ERR_OK){
            $file = new File();
            $query = R::findOne('users', "id = {$_POST['id']}");
            $old_avatar = $query['avatar'];
            //debug($old_avatar);
            //exit();
            $file_name = $file->upload($_FILES['new_avatar']['name'], $_FILES['new_avatar']['tmp_name'],'img/user_avatar/');
            if($file_name){
                R::exec("UPDATE users SET avatar = '$file_name' WHERE id = {$_POST['id']}");
                $file->delete($old_avatar, 'img/user_avatar/');
            }
            redirect('/user/main');
        }
    }

    //public function
    public function createNewPassword(){
        //$user = new UserModel();
        if(!empty($_POST)){
            $email = $_POST['email'];
            if($_POST['password'] === $_POST['confirm_password']){
                $new_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $result = R::exec("UPDATE users SET password = '$new_pass' WHERE email = '$email'");
                if($result){
                    redirect('/account/login');
                }
            }
        }

    }

    public function verification(){

    }

    // reset forgot password
    public function forgotpass(){

    }

    public function findUserForReset(){
        $user = new UserModel();
        if(!empty($_POST)){
            $email = $_POST['email'];
            $userInfo = $user->ifIssetEmail($email);
            if($userInfo!=0){
                //////////////////////////////////////////
                $expire_time = time() + TIME_ACTIVATION_LINK;
                $hash_code = md5($expire_time.$email);
                if($user->resetPassword($hash_code, $email, $expire_time)){
                    Mail::resetPasswordMail($email, $hash_code);
                    redirect('/account/resetpass');
                }
                ////////////////////////////////////////////
            }else{
                redirect();
            }
        }
    }

    public function reset(){
        if(!empty($_GET['code'])){
            $hash_code = $_GET['code'];
            $reset = R::findOne('password_recovery', "WHERE hash_code = '$hash_code' LIMIT 1");
            //$reset = R::getAssoc("SELECT * FROM password_recovery WHERE hash_code = '$hash_code' LIMIT 1");
            $current_time = time();

            if($reset && $reset['time_expire']-$current_time > 0){
                if($reset['hash_code']==$hash_code){
                    redirect('/account/newpassword?email='.$reset['email']);
                }
            }else{
                redirect();
            }

        }
    }

    public function resetpass(){

    }

    public function newpassword(){

    }

}