<?php 

use app\core\Application;
class m_008_create_employees_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS `employees`(
                `employeeId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `userid` int(11) NOT NULL,
                `office` int(11) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY(userid) REFERENCES users(id),
                FOREIGN KEY(office) REFERENCES office(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 008 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `employees`";
            $db->pdo->exec($SQL);
            echo "migration 008 is rolled back" . PHP_EOL;

        }
        
}

?>