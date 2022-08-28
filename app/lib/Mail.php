<?php
namespace app\lib;

class Mail
{
    public $from;
    public $headers = "Content-type: text/html; charset=utf-8\r\n"."X-Mailer: PHP mail script";

    public function sendMail($to, $subject, $message, $from): bool
    {
        if(mail($to, $subject, $message, $from)){
            return true;
        }
    }

    public static function verificationMail($user_email, $activation_code){
        $to=$user_email;
        //$from = 'beaucrowd94@gmail.com';
        $subject="Проверка Email-а";
        $headers = "Content-type: text/html; charset=utf-8\r\n"."X-Mailer: PHP mail script";
        $message='Hi, <br/> <br/> Активация! Пожалуйста перейдите по ссылки для активации вашего аккаунта. <br/> <br/> 
                    <a href="'.BASE_URL.'activation?code='.$activation_code.'">'.BASE_URL.'activation/'.$activation_code.'</a>';
        mail($to, $subject, $message, $headers);
    }

    public static function resetPasswordMail($email, $hash_code){
        $to = $email;
        //$from = 'beaucrowd94@gmail.com';
        $subject="Восстановление пароля.";
        $headers = "Content-type: text/html; charset=utf-8\r\n"."X-Mailer: PHP mail script";
        $message='Hi, <br/> <br/> Для восстановления пароля перейдите по ссылке указанной ниже. <br/> <br/> 
                    Если это были не вы, то немедленно смените свой пароль! <br/> <br/> 
                    P.S. Ссылка будет активна в течении часа. <br/> <br/> 
                    <a href="'.BASE_URL.'reset?code='.$hash_code.'">'.BASE_URL.'reset/'.$hash_code.'</a>';
        mail($to, $subject, $message, $headers);
    }
}