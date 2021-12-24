<?php 

namespace app\models;
use app\core\Model;

class RegisterModel extends Model{
    public string $name;
    public string $email;
    public string $password;
    public string $confpass;

    public function register(){
        echo "Registering user...";
    }
    public function rules(){
        
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6], [self::RULE_MAX, 'max' => 20]],
            'confpass' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}

?>