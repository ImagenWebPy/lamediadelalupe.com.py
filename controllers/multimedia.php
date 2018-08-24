<?php

class Multimedia extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function contenido() {
        header('Content-type: application/json; charset=utf-8');
        $url = $this->helper->getUrl();
        $id = $url[2];
        $data = $this->model->contenido($id);
        echo $data;
    }

}
