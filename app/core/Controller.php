<?php
class Controller 
{
   

    public function View($view, $data = []) {
        require_once "../app/views/" . $view. ".php";
    }

    public function Model($model) {
        require_once '../app/models/'.$model.".php";
        return new $model;
    }

    public function Middleware($middleware){
        require_once '../app/middleware/' . $middleware . ".php";
        return new $middleware;
    }

}

?>