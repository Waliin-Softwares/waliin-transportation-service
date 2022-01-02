<?php 

namespace app\core;


class Application{
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;
    public Session $session;
    public static Application $app;

    public function __construct(){
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database();
        $this->session = new Session();
    }

    public function run(){
        echo $this->router->resolve();
    }

    public function getRouter(){
        return $this->router;
    }
    
}

?>