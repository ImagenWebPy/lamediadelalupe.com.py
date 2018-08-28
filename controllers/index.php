<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->title = TITLE;

        #paremetros
        $this->view->mostrarMenu = $this->helper->mostrarMenu();
        $this->view->mostrarRedes = $this->helper->mostrarRedes();
        $this->view->datosInicio = $this->helper->datosInicio();
        $this->view->quienesSomos = $this->helper->getDatosTabla('quienes_somos', 1);
        $this->view->quienesSomosImagenes = $this->helper->quienesSomosImagenes();
        $this->view->datosDirectores = $this->helper->datosDirectores();
        $this->view->datosEquipo = $this->helper->datosEquipo();
        $this->view->datosValores = $this->helper->datosValores();
        $this->view->datosServicios = $this->helper->datosServicios();
        $this->view->datosHerramientas = $this->helper->datosHerramientas();
        $this->view->datosClientes = $this->helper->datosClientes();
        $this->view->datosMultimedia = $this->helper->datosMultimedia();
        $this->view->datosContacto = $this->helper->getDatosContacto();
        #fin parametros
        #cargamos la vista
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
