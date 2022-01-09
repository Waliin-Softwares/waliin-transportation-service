<?php 

use app\core\Application;
class m_011_create_journey_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS`jounrneys`(
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `route` int(11) NOT NULL,
                `bus` int(11) NOT NULL,
                `seatAvailable` INT,
                `date` DATE NOT NULL,
                `time` varchar(5) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (`route`) REFERENCES `routes`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY (`bus`) REFERENCES `bus`(`id`) ON DELETE CASCADE ON UPDATE CASCADE

            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 011 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `jounrneys`";
            $db->pdo->exec($SQL);
            echo "migration 011 is rolled back" . PHP_EOL;

        }
        
}

?>