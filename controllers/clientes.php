<?php

class Clientes extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function cliente() {
        header('Content-type: application/json; charset=utf-8');
        $url = $this->helper->getUrl();
        $id = $url[2];
        $data = $this->model->cliente($id);
        echo $data;
    }

}
