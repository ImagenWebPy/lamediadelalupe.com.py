<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        //echo Hash::create('sha256', '2543asdaul.chucky', HASH_PASSWORD_KEY);
        //echo $this->helper->encrypt('Asasas)&RC','e');
        echo $this->helper->encrypt('4ec^]rYf4Rv=7y@k','e');
    }

    public function index() {
        #cargamos la vista
        $this->view->title = 'Inicie Sesión';
        $this->view->render('admin/login/header');
        $this->view->render('admin/login/index');
        $this->view->render('admin/login/footer');
        if (isset($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function iniciar() {
        $datos = array(
            'email' => $this->helper->cleanInput($_POST['login']['email']),
            'contrasena' => $this->helper->cleanInput($_POST['login']['contrasena']),
        );
        $data = $this->model->iniciar($datos);
        echo json_encode($data);
    }

    public function salir() {
        session_destroy();
        Auth::handleLogin();
    }

}
