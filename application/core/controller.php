<?php

namespace application\core;

class controller
{

    public function model($model)
    {
        require "../application/models/". $model .".php";
        $classe = "application/models\\" .$model;
        return new $classe();
    }
    public function view(string $view, $data = [])
    {
        require "../application/views/" . $view . ".php";
    }
    public function pageNotFound()
    {
        $this->view('404/index');
    }

}
?>