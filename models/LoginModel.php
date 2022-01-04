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
        $user = Application::$app->db->queryOne("SELECT * FROM users WHERE email=:email", [':email'=>$this->email]);
        if(!$user){
            $this->addError("email", "user does't extist with this email");
            return false;
        }
        else{
            if(!password_verify($this->password, $user['password'])){
                $this->addError("password", "password is incorrect");
                return false;
            }
            else{
                Application::$app->user->login($user);
                return true;
            }
        }

        return true;
    }
}


