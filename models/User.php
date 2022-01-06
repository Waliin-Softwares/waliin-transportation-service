<?php 

namespace app\models;
use app\core\DbModel;



class User extends DbModel{
    public string $username="";
    public string $firstName="";
    public string $lastName="";
    public string $email="";
    public string $password="";
    public string $gender="";
    public string $confirmPassword="";
    public string $role="customer";
    public string $address="";
    public string $phoneNumber="";


    public function register(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return $this->save();
    }
    public function rules(){
        
        return [
            'username' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_UNIQUE],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6], [self::RULE_MAX, 'max' => 20]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
            'firstName' => [self::RULE_REQUIRED, self::RULE_ALPHA],
            'lastName' => [self::RULE_REQUIRED, self::RULE_ALPHA],
            'username' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], self::RULE_UNIQUE],
            'address' => [self::RULE_REQUIRED],
            'phoneNumber' => [self::RULE_REQUIRED, self::RULE_PHONENUM],

        ];
    }
    public function tableName(){
        return "users";
    }
    public function attributes(){
        return ['firstName', 'lastName', 'username', 'email', 'password', 'gender', 'role', 'address', 'phoneNumber'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
