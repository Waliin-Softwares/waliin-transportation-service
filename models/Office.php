<?php 

namespace app\models;
use app\core\DbModel;


class Office extends DbModel{
    public string $officeName="";
    public string $address="";
    public array $others=[];

    public function set($attribute, $value){
        $this->{$attribute} = $value;
    }
    public function add(){
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
            'officeName' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'address' => [self::RULE_REQUIRED]
        ];
    }
    public function tableName(){
        return "office";
    }
    public function attributes(){
        return ['officeName', 'address'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
