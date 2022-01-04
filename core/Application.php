<?php 

namespace app\core;


class Application{
    public string $userClass = "app\models\User::class";
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;
    public Session $session;
    public ?Dbmodel $user;
    public static Application $app;

    public function __construct(){
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database();
        $this->session = new Session();


        $primaryValue = $this->session->get("user");
        if($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne()([$primaryKey => $primaryValue]);
        }
    }

    public function run(){
        echo $this->router->resolve();
    }

    public function getController(){
        return $this->controller;
    }
    public function setController(Controller $controller){
        $this->controller = $controller;
    }
    public function getRouter(){
        return $this->router;
    }
    public function login(Dbmodel $user){
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set("user", $primaryKey);

    }
    
}

?>