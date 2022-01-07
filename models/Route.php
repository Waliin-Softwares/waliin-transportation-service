<?php 

namespace app\models;
use app\core\DbModel;



class Route extends DbModel{
    public string $routename="";
    public string $source="";
    public string $destination="";
    public string $cost="";
    public array $others=[];


    public function add(){
        return $this->save();
    }
    public function rules(){
        return [
            'routename' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'source' => [self::RULE_REQUIRED, self::RULE_ALPHA],
            'destination' => [self::RULE_REQUIRED, self::RULE_ALPHA],
            'cost' => [self::RULE_REQUIRED],

        ];
    }
    public function tableName(){
        return "routes";
    }
    public function attributes(){
        return ['routename', 'source', 'destination', 'cost'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
