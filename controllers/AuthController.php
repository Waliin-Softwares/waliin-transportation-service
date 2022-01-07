<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\User;
use app\models\LoginModel;
use app\models\UpdateProfileModel;
use app\models\ChangePasswordModel;
use app\core\Application;

class AuthController extends Controller{
    public function login(Request $request, Response $response){
        $this->setLayout("auth");
        $loginModel = new LoginModel();
        if($request->isPost()){
            $loginModel->loadData($request->getBody());
            if($loginModel->validate() && $loginModel->login()){
                $response->redirect("/");
                exit;
            }
        }
        return $this->render("login", [
            'model' => $loginModel
        ]);
    }
    public function register(Request $request, Response $response){
        $this->setLayout("auth");
        $registerModel = new User();
        
        if($request->isPost()){
            $registerModel->loadData($request->getBody());
            if($registerModel->validate() && $registerModel->register()){
                Application::$app->session->setFlash('success', "Thanks for registering click the login to sign in");
                $response->redirect("/");
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
    public function logout(){
        Application::$app->logout();
        Application::$app->response->redirect("/");
    }
    public function profile(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $model = new UpdateProfileModel();
        if($request->isPost()){
            $model->loadData($request->getBody());
            if($model->validate() && $model->update()){
                Application::$app->session->setFlash('success', "Profile updated");
                $response->redirect("/");
                exit;
            }
        }
        return $this->render("profile", [
            'model' => $model,
            'user' => Application::$app->user
        ]);
        
    }
    public function changePassword(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $model = new ChangePasswordModel();
        if($request->isPost()){
            $model->loadData($request->getBody());
            if($model->validate() && $model->changePassword()){
                Application::$app->session->setFlash('success', "Password changed");
                $response->redirect("/");
                exit;
            }
        }
        return $this->render("changepassword", [
            'model' => $model,
            'user' => Application::$app->user
        ]);
        
    }
    public function addAdmin(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $user = Application::$app->user;
        if(!$user->isSuper()){
            $response->redirect("/");
            exit;
        }
        $this->setLayout("auth");
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->changeVals('role', 'admin')){
                Application::$app->session->setFlash('success', "succesfully added to admins");
                $response->redirect("/");
                exit;

            }
            
        }
        return $this->render("addadmin", [
            'model' => $user
        ]);

    }
    
}

?>
