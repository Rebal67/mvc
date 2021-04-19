<?php
class Controller
{
    public function model($model)
    {
        $modelName = "../app/models/$model.php";

        if (file_exists($modelName)) {
            require_once $modelName;
            return new $model();
        } else {
            die("Model $model doesn't exsits ");
        }
    }

    public function view($view,$data = [])
    {   
    
        $viewname = "../app/views/$view.php";

        if(file_exists($viewname)){
            require_once $viewname;
        }else{
            die("View $view doesn't exists");
        }
    }
}
