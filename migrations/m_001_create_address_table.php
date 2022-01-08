
<?php 

use app\core\Application;
class m_001_create_address_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS `address`(
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `addressName` varchar(255) NOT NULL,
                `woreda` varchar(255),
                `zone` varchar(255),
                `region` varchar(255),
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 001 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `address`";
            $db->pdo->exec($SQL);
            echo "migration 001 is rolled back" . PHP_EOL;

        }
        
}

?>