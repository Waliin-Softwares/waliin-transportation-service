<?php 

namespace app\models;
use app\core\DbModel;



class Bus extends DbModel{
    public string $busNumber="";
    public string $capacity="";
    public array $others=[];


    public function add(){
        return $this->save();
    }
    public function rules(){
        return [
            'busNumber' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'capacity' => [self::RULE_REQUIRED]
        ];
    }
    public function tableName(){
        return "bus";
    }
    public function attributes(){
        return ['busNumber', 'capacity'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
