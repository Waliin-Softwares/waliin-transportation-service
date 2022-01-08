<?php 

namespace app\models;
use app\core\DbModel;
use app\core\Application;



class Officer extends DbModel{
    public string $userid="";
    public string $office="";
    public array $others=[];

    public function set($attibute, $value){
        $this->{$attibute} = $value;
    }
    public function add(){
        $others = Application::$app->users->others;
        
        return $this->save();
    }
    public function rules(){
        return [
        ];
    }
    public function tableName(){
        return "officers";
    }
    public function attributes(){
        return ['userid', 'office'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
