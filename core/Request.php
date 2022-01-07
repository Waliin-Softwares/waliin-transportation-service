<?php
namespace app\core;

class Request{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($path, '?');
        if ($pos !== false) {
            $path = substr($path, 0, $pos);
        }
        return $path;
    }
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody(){
        $body = [];
        if($this->getMethod() === 'get'){
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        elseif($this->getMethod() === 'post'){
            foreach($_POST as $key => $value){
                if(is_array($value)){
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                }
                else{
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
        return $body;
    }

    public function isPost(){
        return $this->getMethod() === 'post';
    }

    public function isGet(){
        return $this->getMethod() === 'get';
    }
}

?>