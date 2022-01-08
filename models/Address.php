<?php 

namespace app\models;
use app\core\DbModel;


class Address extends DbModel{
    public string $addressName="";
    public string $woreda="";
    public string $zone="";
    public string $region="";
    public array $others=[];

    public function set($attribute, $value){
        $this->{$attribute} = $value;
    }
    public function add(){
        return $this->save();
    }
    public function rules(){
        return [
            'addressName' => [self::RULE_REQUIRED]
        ];
    }
    public function tableName(){
        return "address";
    }
    public function attributes(){
        return ['addressName', 'woreda', 'zone', 'region'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
