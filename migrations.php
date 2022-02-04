<?php 

    /** User: Waliin-Softwares*/ 
    require_once __DIR__.'/vendor/autoload.php';
    use app\core\Application;

    $app = new Application();

    $app->db->applyMigration();
    
?>
