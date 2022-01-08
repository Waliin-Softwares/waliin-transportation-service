<?php 

namespace app\models;
use app\core\DbModel;
use app\core\Application;



class Manager extends DbModel{
    public string $userid="";
    public array $others=[];

    public function set($attibute, $value){
        $this->{$attibute} = $value;
    }
    public function add(){
        $others = Application::$app->users->others;
        var_dump($others);
        foreach($others as  $id){
            $this->userid = $id;
            $this->save();
        }
        return $this->save();
    }
    public function rules(){
        return [
        ];
    }
    public function tableName(){
        return "manager";
    }
    public function attributes(){
        return ['userid'];
    }
    public function primaryKey(){
        return 'id';
    }

}

?>
