<?php 
namespace app\core;

abstract class DbModel extends Model{
    abstract public function tableName();
    abstract public function attributes();
    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = [];
        $statement = self::prepare("INSERT INTO $tableName (".emplode(',', $attributes).
        ") VALUES (:".implode(',:', $params).")");
        
    }
    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}

?>