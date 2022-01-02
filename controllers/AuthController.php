<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;
use app\core\Application;

class AuthController extends Controller{
    public function login(Request $request){
        $this->setLayout("auth");
        if($request->isPost()){
            return "handling submitted data";
        }
        return $this->render("login");
    }
    public function register(Request $request){
        $this->setLayout("auth");
        $registerModel = new RegisterModel();
        
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