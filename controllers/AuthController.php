<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\models\LoginModel;
use app\core\Application;

class AuthController extends Controller{
    public function login(Request $request){
        $this->setLayout("auth");
        $loginModel = new LoginModel();
        if($request->isPost()){
            $loginModel->loadData($request->getBody());
            if($loginModel->validate() && $loginModel->login()){
                Application::$app->response->redirect("/");
                exit;
            }
        }
        return $this->render("login", [
            'model' => $loginModel
        ]);
    }
    public function register(Request $request){
        $this->setLayout("auth");
        $registerModel = new User();
        
        if($request->isPost()){
            $registerModel->loadData($request->getBody());
            if($registerModel->validate() && $registerModel->register()){
                Application::$app->session->setFlash('success', "Thanks for registering");
                Application::$app->response->redirect("/");
                exit;
            }
            else{
                return $this->render("register", [
                    'model' => $registerModel
                ]);
            }
        }
        
        
        return $this->render("register", [
            'model' => $registerModel
        ]);
    }
}

?>