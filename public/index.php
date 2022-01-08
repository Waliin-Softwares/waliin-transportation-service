<?php 

    /** User: Jonny-me*/ 
    require_once __DIR__.'/../vendor/autoload.php';
    use app\core\Application;
    use app\controllers\SiteController;
    use app\controllers\AuthController;
    use app\controllers\TransportController;

    $app = new Application();

    $app->router->get("/", [SiteController::class, "home"]);
    $app->router->get("/contact", [SiteController::class, "contact"]);
    $app->router->post("/contact", [SiteController::class, "handle_contact"]);

    $app->router->get("/login", [AuthController::class, "login"]);
    $app->router->get("/register", [AuthController::class, "register"]);
    $app->router->post("/login", [AuthController::class, "login"]);
    $app->router->post("/register", [AuthController::class, "register"]);
    $app->router->get("/logout", [AuthController::class, "logout"]);
    $app->router->get("/profile", [AuthController::class, "profile"]);
    $app->router->post("/profile", [AuthController::class, "profile"]);
    $app->router->get("/changepassword", [AuthController::class, "changePassword"]);
    $app->router->post("/changepassword", [AuthController::class, "changePassword"]);
    $app->router->get("/addmanager", [TransportController::class, "addManager"]);
    $app->router->post("/addmanager", [TransportController::class, "addManager"]);
    $app->router->get("/addofficer", [TransportController::class, "addOfficer"]);
    $app->router->post("/addofficer", [TransportController::class, "addOfficer"]);
    $app->router->get("/addemployee", [TransportController::class, "addEmployee"]);
    $app->router->post("/addemployee", [TransportController::class, "addEmployee"]);
    $app->router->get("/addroute", [TransportController::class, "addRoute"]);
    $app->router->post("/addroute", [TransportController::class, "addRoute"]);
    $app->router->get("/addbus", [TransportController::class, "addBus"]);
    $app->router->post("/addbus", [TransportController::class, "addBus"]);
    

    

    $app->run();


    
?>