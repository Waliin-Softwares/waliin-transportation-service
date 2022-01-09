<?php 

namespace app\models;
use app\core\DbModel;
use app\core\Application;


class Ticket extends DbModel{
    public string $route="";
    public string $jounrney="";
    public string $reservedBy="";
    public string $seatNumber="";
    public string $date="";
    public string $time="";
    public string $paid="no";
    public array $others=[];


    public function add(){
        $jounrney = new Jounrney();
        $jounrney = $jounrney->findOne(['route' => $this->route]);
        if(!$jounrney){
            $this->addError('route', 'there are no available jounrneys by this route');
            return false;
        }
        else{
            $jounrney = $jounrney->findOne(['route' => $this->route, 'date' => $this->date]);
            if(!$jounrney){
                $this->addError('date', 'there are no jounrneys in this date');
                return false;
            }
            else{
                $jounrney = $jounrney->findOne([
                    'route' => $this->route, 
                    'date' => $this->date, 
                    'time' => $this->time
                ]);
                if(!$jounrney){
                    $this->addError('time', 'there are no jounrneys that start at this time');
                    return false;
                }
                else{
                    $seats = $jounrney->seatAvailable;
                    if($seats == 0){
                        $this->addError('time', 'all seats are taken');
                        return false;
                    }
                }
            }
        }
        $this->jounrney = $jounrney->id;
        $user = Application::$app->user;
        $this->reservedBy = $user->id;
        $bus = Bus::findOne(['id' => $jounrney->bus]);
        $capacity = $bus->capacity;
        $this->seatNumber = $capacity - $jounrney->seatAvailable + 1; 
        $jounrney->updateOne(['seatAvailable' => $jounrney->seatAvailable-1], ['id' => $jounrney->id]);
        return $this->save();
    }
    public function rules(){
        return [
            'route' => [self::RULE_REQUIRED],
            'date' => [self::RULE_REQUIRED, self::RULE_DATE],
            'time' => [self::RULE_REQUIRED]
        ];
    }
    public function tableName(){
        return "tickets";
    }
    public function attributes(){
        return ['jounrney', 'reservedBy', 'seatNumber', 'paid'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
