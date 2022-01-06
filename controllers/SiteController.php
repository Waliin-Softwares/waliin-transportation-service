<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Application;

class SiteController extends Controller{
    

    public function home(){
        return $this->render("home", [
            'model' => Application::$app->user
        ]);
    }
    
    public function contact(){
        return $this->render("contact");
    }

    public function handle_contact(Request $request){
        $body = $request->getBody();
        return "thanks for contacting us";
    }



}


?>