<?php 
namespace app\models;
use app\core\DbModel;
use app\core\Application;



class UpdateProfileModel extends DbModel{
    public string $id="";
    public string $username="";
    public string $firstName="";
    public string $lastName="";
    public string $email="";
    public string $address="";
    public string $phoneNumber="";

    public function __construct(){
        $user = Application::$app->user;
        foreach($user as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function rules(){
        
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_NUNIQUE],
            'firstName' => [self::RULE_REQUIRED, self::RULE_ALPHA],
            'lastName' => [self::RULE_REQUIRED, self::RULE_ALPHA],
            'username' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], self::RULE_NUNIQUE],
            'address' => [self::RULE_REQUIRED],
            'phoneNumber' => [self::RULE_REQUIRED, self::RULE_PHONENUM],

        ];
    }
    public function tableName(){
        return "users";
    }
    public function attributes(){
        return ['firstName', 'lastName', 'username', 'email', 'phoneNumber', 'id'];
    }
    public function primaryKey(){
        return 'id';
    }



}

?>
