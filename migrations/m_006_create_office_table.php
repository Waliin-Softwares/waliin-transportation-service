
<?php 

use app\core\Application;

class m_006_create_office_table{
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS `office`(
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `officeName` VARCHAR(255),
                `address` int(11) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY(address) REFERENCES address(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 006 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `office`";
            $db->pdo->exec($SQL);
            echo "migration 006 is rolled back" . PHP_EOL;

        }
        
}

?>