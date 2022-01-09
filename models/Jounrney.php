<?php 

namespace app\models;
use app\core\DbModel;


class Jounrney extends DbModel{
    public string $route="";
    public string $bus="";
    public string $seatAvailable="";
    public string $date="";
    public string $time="";
    public array $others=[];


    public function add(){
        $buses = new Bus();
        $val = $buses->getOne(['capacity'], ["id" => $this->bus]);
        $this->seatAvailable = $val['capacity'];

        return $this->save();
    }
    public function rules(){
        return [
            'route' => [self::RULE_REQUIRED],
            'bus' => [self::RULE_REQUIRED],
            'date' => [self::RULE_REQUIRED],
            'time' => [self::RULE_REQUIRED],

        ];
    }
    public function tableName(){
        return "jounrneys";
    }
    public function attributes(){
        return ['route', 'bus', 'seatAvailable', 'date', 'time'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
