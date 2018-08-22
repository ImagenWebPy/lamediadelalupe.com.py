<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->title = TITLE . ' Inicio';

        #paremetros
        $this->view->mostrarMenu = $this->helper->mostrarMenu();
        $this->view->mostrarRedes = $this->helper->mostrarRedes();
        $this->view->datosInicio = $this->helper->datosInicio();
        #fin parametros
        #cargamos la vista
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
