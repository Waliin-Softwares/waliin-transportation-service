<?php 

use app\core\Application;
class m_003_create_users_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS `users`(
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `username` varchar(255) NOT NULL,
                `email` varchar(255) NOT NULL,
                `firstName` varchar(255) NOT NULL,
                `lastName` varchar(255) NOT NULL,
                `password` varchar(255) NOT NULL,
                `phoneNumber` varchar(10) NOT NULL,
                `dateOfBirth` Date,
                `gender` char(1),
                `role` varchar(255) NOT NULL,
                `address` int(11) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY(address) REFERENCES address(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 003 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `users`";
            $db->pdo->exec($SQL);
            echo "migration 003 is rolled back" . PHP_EOL;

        }
        
}

?>