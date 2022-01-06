<?php 
namespace app\models;
use app\core\DbModel;
use app\core\Application;



class ChangePasswordModel extends DbModel{
    public string $id="";
    public string $oldPassword="";
    public string $newPassword="";
    public string $confirmPassword="";
    public string $password="";


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
            'oldPassword' => [self::RULE_REQUIRED, [self::RULE_DBMATCH, 'match' => 'password']],
            'newPassword' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6], [self::RULE_MAX, 'max' => 20]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'newPassword']],

        ];
    }
    public function changePassword(){
        $this->password = password_hash($this->newPassword, PASSWORD_DEFAULT);
        return $this->update();   
    }
    public function tableName(){
        return "users";
    }
    public function attributes(){
        return ['password', 'id'];
    }
    public function primaryKey(){
        return 'id';
    }



}

?>
