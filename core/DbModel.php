<?php
namespace app\core;

abstract class DbModel extends Model{
    abstract public function tableName();
    abstract public function attributes();
    abstract public function primaryKey();
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
    public function findOne($where){
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(function($attribute){
            return "$attribute = :$attribute";
        }, $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
    public function update(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $primaryKey = $this->primaryKey();
        $sql = implode(',', array_map(function($attribute){
            return "$attribute = :$attribute";
        }, $attributes));
        $statement = self::prepare("UPDATE $tableName SET $sql WHERE $primaryKey = :$primaryKey");
        foreach($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }
    public function delete(){
        $tableName = $this->tableName();
        $primaryKey = $this->primaryKey();
        $statement = self::prepare("DELETE FROM $tableName WHERE $primaryKey = :$primaryKey");
        $statement->bindValue(":$primaryKey", $this->{$primaryKey});
        $statement->execute();
        return true;
    }
    public function findAll($where = []){
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(function($attribute){
            return "$attribute = :$attribute";
        }, $attributes));
        $stmt = "SELECT * FROM $tableName ";
        if(!empty($sql)){
            $stmt .= "WHERE $sql";
        }
        $statement = self::prepare($stmt);
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public function updateOne($set, $where){
        $tableName = $this->tableName();
        $attributes = array_keys($set);
        $sql = implode(',', array_map(function($attribute){
            return "$attribute = :$attribute";
        }, $attributes));
        $attributes = array_keys($where);
        $sql2 = implode("AND ", array_map(function($attribute){
            return "$attribute = :$attribute";
        }, $attributes));
        $statement = self::prepare("UPDATE $tableName SET $sql WHERE $sql2");
        foreach($set as $key => $item){
            $statement->bindValue(":$key", $item);
        }
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return true;

    }
    public function getOne($vals, $where){
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $val = implode(", ", $vals);
        $sql = implode("AND ", array_map(function($attribute){
            return "$attribute = :$attribute";
        }, $attributes));
        $statement = self::prepare("SELECT $val FROM $tableName WHERE $sql");
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetch();
    }

}

?>
