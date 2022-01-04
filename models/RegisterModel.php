<?php 

namespace app\models;
use app\core\DbModel;



class RegisterModel extends DbModel{
    public string $name="";
    public string $email="";
    public string $password="";
    public string $confirmPassword="";

    public function register(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return $this->save();
    }
    public function rules(){
        
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_UNIQUE],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6], [self::RULE_MAX, 'max' => 20]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
    public function tableName(){
        return "users";
    }
    public function attributes(){
        return ['name', 'email', 'password'];
    }

}

?>
