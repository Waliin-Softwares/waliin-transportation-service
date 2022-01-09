<?php 

use app\core\Application;
class m_012_create_tickets_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS`tickets`(
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `jounrney` int(11) NOT NULL,
                `reservedBy` int(11) NOT NULL,
                `seatNumber` INT NOT NULL,
                `paid` varchar(5) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (`jounrney`) REFERENCES `jounrneys`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY (`reservedBy`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE

            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 012 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `tickets`";
            $db->pdo->exec($SQL);
            echo "migration 012 is rolled back" . PHP_EOL;

        }
        
}

?>