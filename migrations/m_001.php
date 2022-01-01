<?php 

class m_001{
        
        public function up(){
            $sql = "CREATE TABLE IF NOT EXISTS `users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                `email` varchar(255) NOT NULL,
                `password` varchar(255) NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            DB::query($sql);
        }
        
        public function down(){
            $sql = "DROP TABLE `users`";
            DB::query($sql);
        }
        
}

?>