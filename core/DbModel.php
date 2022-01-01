<?php 
namespace app\core;

abstract class DbModel extends Model{
    abstract public function tableName();
    abstract public function attributes();
    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).
        ") VALUES (:".implode(',:', $attributes).")");
        
        foreach($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        
        $statement->execute();
        return true;
        
    }
    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}

?>