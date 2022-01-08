<?php 

use app\core\Application;
class m_002_create_new_address{
        
        public function up(){
            $db = Application::$app->db;
            $SQL =  "INSERT INTO `address` (addressName) 
                     VALUES ('new')
                    ";

            $db->pdo->exec($SQL);
            echo "migration 002 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DELETE FROM `address` WHERE id = 1";
            $db->pdo->exec($SQL);
            echo "migration 002 is rolled back" . PHP_EOL;

        }
        
}

?>