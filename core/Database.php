<?php

namespace app\core;

class Database{
    public \PDO $pdo;
    public function __construct(){
        $this->pdo = new \PDO("mysql:host=localhost;dbname=transportation_service", "root", "");
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }
    public function applyMigration(){
        $this->createMigrationTable();
        $newMigrations = [];
        $files = scandir(__DIR__ . '/../migrations');
        foreach ($files as $file){
            if($file != '.' && $file != '..'){
                if($this->checkMigration($file)){
                    require_once __DIR__ . '/../migrations/' . $file;
                    $class = str_replace('.php', '', $file);
                    $instance = new $class();    
                    $this->log('applying migration '. $file);  
                    $instance->up();
                    $this->log('applied migration '. $file);
                    $newMigrations[] = $file;
                }
            }
        }
        if(!empty($newMigrations)){
            $this->saveMigration($newMigrations);
        }
        else{
            echo $this->log('all migrations are already applied');
        }
    }
    public function createMigrationTable(){
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS `migrations` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `migration` varchar(255) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }
    public function checkMigration($migration){
        $stmt = $this->pdo->prepare("SELECT * FROM migrations WHERE migration = :migration");
        $stmt->execute(['migration' => $migration]);
        $result = $stmt->fetchAll();
        return count($result) == 0;
    }
    public function saveMigration(array $migrations){
        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES (:migration)");
        foreach ($migrations as $migration){
            $stmt->execute(['migration' => $migration]);
        }
    }
    protected function log($message){
        echo '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
    }
}

?>