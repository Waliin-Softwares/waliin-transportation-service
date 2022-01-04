<?php 

namespace app\models;
use app\core\Model;
use app\core\Application;
use app\models\User;

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
        $user = User::findOne(['email' => $this->email]);
        if(!$user){
            $this->addError("email", "user does't exist with this email");
            return false;
        }
        else{
            if(!password_verify($this->password, $user->password)){
                $this->addError("password", "password is incorrect");
                return false;
            }
            else{
                return Application::$app->login($user);
                
            }
        }

        
    }
}


