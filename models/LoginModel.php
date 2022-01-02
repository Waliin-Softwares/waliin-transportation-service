<?php 

namespace app\models;
use app\core\Model;
use app\core\Application;

class LoginModel extends Model{
    public string $email="";
    public string $password="";
    public function rules(){

        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }
    public function login(){
        // if(!$user){
        //     $this->addError("email", "user does't extist with this email");
        //     return false;
        // }
        // Application::$app->login();
        return true;
    }
}

?>
