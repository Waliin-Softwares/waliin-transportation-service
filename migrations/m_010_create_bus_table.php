<?php 

use app\core\Application;
class m_010_create_bus_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS `bus`(
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `sideNumber` varchar(255) NOT NULL,
                `plateNumber` varchar(255) NOT NULL,
                `capacity` INT NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 010 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `bus`";
            $db->pdo->exec($SQL);
            echo "migration 010 is rolled back" . PHP_EOL;

        }
        
}

?>