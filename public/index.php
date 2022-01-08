<?php 

    /** User: Jonny-me*/ 
    require_once __DIR__.'/../vendor/autoload.php';
    use app\core\Application;
    use app\controllers\SiteController;
    use app\controllers\AuthController;

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
    $app->router->get("/addadmin", [AuthController::class, "addAdmin"]);
    $app->router->post("/addadmin", [AuthController::class, "addAdmin"]);
    $app->router->get("/addofficer", [AuthController::class, "addOfficer"]);
    $app->router->post("/addofficer", [AuthController::class, "addOfficer"]);
    $app->router->get("/addemployee", [AuthController::class, "addEmployee"]);
    $app->router->post("/addemployee", [AuthController::class, "addEmployee"]);
    $app->router->get("/addroute", [AuthController::class, "addRoute"]);
    $app->router->post("/addroute", [AuthController::class, "addRoute"]);
    $app->router->get("/addbus", [AuthController::class, "addBus"]);
    $app->router->post("/addbus", [AuthController::class, "addBus"]);
    

    

    $app->run();


    
?>