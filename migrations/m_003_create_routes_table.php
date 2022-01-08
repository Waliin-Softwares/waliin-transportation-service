<?php 

use app\core\Application;
class m_003_create_routes_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS`routes`(
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `routename` varchar(255) NOT NULL,
                `source` varchar(255) NOT NULL,
                `destination` varchar(255) NOT NULL,
                `cost` DOUBLE,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 003 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `routes`";
            $db->pdo->exec($SQL);
            echo "migration 003 is rolled back" . PHP_EOL;

        }
        
}

?>