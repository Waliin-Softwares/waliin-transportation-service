<?php 

use app\core\Application;
class m_007_create_officers_table{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "CREATE TABLE IF NOT EXISTS `officers`(
                `officerId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `userid` int(11) NOT NULL,
                `office` int(11) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY(userid) REFERENCES users(id),
                FOREIGN KEY(office) REFERENCES office(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $db->pdo->exec($SQL);
            echo "migration 007 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DROP TABLE `officers`";
            $db->pdo->exec($SQL);
            echo "migration 007 is rolled back" . PHP_EOL;

        }
        
}

?>