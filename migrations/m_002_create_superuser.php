<?php 

use app\core\Application;
class m_002_create_superuser{
        
        public function up(){
            $default_password = password_hash("waliin", PASSWORD_DEFAULT);
            $db = Application::$app->db;
            $SQL =  "INSERT INTO users (username, email, firstName, lastName, password, phoneNumber, gender, role, address) 
                     VALUES ('super', 'super@waliin.com', 'super', 'user', '$default_password', '0000000000', 'M', 'super', 'new')
                    ";

            $db->pdo->exec($SQL);
            echo "migration 002 is applied" . PHP_EOL;
        }
        
        public function down(){
            $db = Application::$app->db;
            $SQL = "DELETE FROM users WHERE id = 1";
            $db->pdo->exec($SQL);
            echo "migration 002 is rolled back" . PHP_EOL;

        }
        
}

?>