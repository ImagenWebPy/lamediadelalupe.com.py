<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        #cargamos la vista
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
