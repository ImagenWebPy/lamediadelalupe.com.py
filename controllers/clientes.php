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

    public function contacto() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
            'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
            'mensaje' => (!empty($_POST['mensaje'])) ? $this->helper->cleanInput($_POST['mensaje']) : NULL
        );
        $datos = $this->model->contacto($data);
        echo json_encode($datos);
    }

}
