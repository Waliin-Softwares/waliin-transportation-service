<?php 

namespace app\models;
use app\core\DbModel;



class Bus extends DbModel{
    public string $sideNumber="";
    public string $capacity="";
    public string $plateNumber="";
    public array $others=[];


    public function add(){
        return $this->save();
    }
    public function rules(){
        return [
            'sideNumber' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'plateNumber' => [self::RULE_REQUIRED, self::RULE_UNIQUE, [self::RULE_MIN, 'min' => 6]],
            'capacity' => [self::RULE_REQUIRED ]
        ];
    }
    public function tableName(){
        return "bus";
    }
    public function attributes(){
        return ['sideNumber', 'plateNumber', 'capacity'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
