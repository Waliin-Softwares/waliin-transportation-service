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
    public array $others=[];


    public function register(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $Address = new Address();
        $val = $Address->getOne(['id'], ["addressName" => $this->address]);
        if(!$val){
            $Address->set('addressName', $this->address);
            $Address->save();
            $val = $Address->getOne(['id'], ["addressName" => $this->address]);
        }
        $this->address = $val['id'];
        return $this->save();
    }
    public function rules(){
        
        return [
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
    public function getName(){
        return $this->firstName . " " . $this->lastName;
    }
    public function isManager(){
        return $this->role == "manager";
    }
    public function isSuper(){
        return $this->role == "super";
    }
    public function isOfficer(){
        return $this->role == "officer";
    }
    public function isEmployee(){
        return $this->role == "employee";
    }
    public function changeValManager($key, $value){

        $set = [$key => $value];
        foreach($this->others as $id){
            $where = ['id' => $id];
            $model = new Manager();
            $model->set('userid', $id);
            $model->save();
            $this->updateOne($set, $where);
        }
        return true;
    }
    public function changeValOfficer($id){

        $this->updateOne(["role" => "officer"], ['id' => $id]);
        return true;
    }
    public function changeValEmployee($id){

        $this->updateOne(["role" => "emplloyee"], ['id' => $id]);
        return true;
    }


}

?>
