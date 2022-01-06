<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{
    

    public function home(){
        $params = [
            'name' => "jonny"
        ];
        return $this->render("home", $params);
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