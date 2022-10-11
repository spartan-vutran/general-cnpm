<?php
class Controller{
    use tool;
    public function model($model){
        require_once "./models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./views/".$view.".php";
        // require_once "./views/".$data["Page"].".php";
    }

}
?>