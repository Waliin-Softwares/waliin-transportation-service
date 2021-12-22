<?php 

namespace app\models;
use app\core\Model;

class RegisterModel extends Model{
    public string $name;
    public string $email;
    public string $password;
    public string $confpass;

    public function register(){
        echo "Registering user...";
    }
}

?>