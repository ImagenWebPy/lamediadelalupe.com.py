<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {
        $this->view->title = TITLE . 'Inicio';
        $this->view->public_css = array("css/plugins/daterangepicker/daterangepicker-bs3.css");
        $this->view->public_js = array("js/plugins/daterangepicker/momen.min.js", "js/plugins/daterangepicker/daterangepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/index/index');
        $this->view->render('admin/footer');
    }

    public function inicio() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Inicio';

        $this->view->datosSeccion1 = $this->model->datosSeccion1();

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/inicio/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function quienes_somos() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Quienes Somos';

        $this->view->datosContenido = $this->model->datosContenido('quienes_somos');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/quienes_somos/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function valores() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Valores';

        $this->view->datosContenido = $this->model->datosContenido('valores');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/valores/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function servicios() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Valores';

        $this->view->datosContenido = $this->model->datosContenido('servicios');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/servicios/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function directores() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Quienes Somos';

        $this->view->datosContenido = $this->model->datosContenido('directores');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/directores/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function equipo() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Equipo';

        $this->view->datosContenido = $this->model->datosContenido('equipo');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/equipo/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function clientes() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Clientes';

        $this->view->datosContenido = $this->model->datosContenido('clientes');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/clientes/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function noticias() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Noticias';

        $this->view->datosContenido = $this->model->datosContenido('multimedia');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/noticias/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function herramientas() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Herramientas';

        $this->view->datosContenido = $this->model->datosContenido('herramientas');

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/herramientas/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function usuarios() {
        $this->view->title = 'Usuarios';
        #cargamos las librerias extras
        $this->view->helper = new Helper();
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/dataTables/dataTables.rowReorder.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/pdfobject/pdfobject.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/datapicker/bootstrap-datepicker.js", "js/plugins/input-mask/jquery.inputmask.js", "js/plugins/input-mask/jquery.inputmask.numeric.extensions.js", "js/plugins/datapicker/locales/bootstrap-datepicker.es.min.js");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/usuarios/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function redes() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Redes';
        $this->view->getRedesTable = $this->model->getRedesTable();
        $this->view->public_css = array("css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/toastr/toastr.min.css");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/toastr/toastr.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/redes/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function menu() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Menú';
        $this->view->getMenu = $this->model->getMenu();
        $this->view->public_css = array("css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/toastr/toastr.min.css");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/toastr/toastr.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/menu/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function listadoDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTSlider();
        echo $data;
    }

    public function listadoDTQuienesSomos() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTQuienesSomos();
        echo $data;
    }

    public function listadoDTHerramientasImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTHerramientasImg();
        echo $data;
    }

    public function listadoDTServiciosImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTServiciosImg();
        echo $data;
    }

    public function listadoDTDirectoresImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTDirectoresImg();
        echo $data;
    }

    public function listadoDTDirectores() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTDirectores();
        echo $data;
    }

    public function listadoDTEquipo() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTEquipo();
        echo $data;
    }

    public function listadoDTClientes() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTClientes();
        echo $data;
    }

    public function listadoDTNoticias() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTNoticias();
        echo $data;
    }

    public function listadoDTHerramientas() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTHerramientas();
        echo $data;
    }

    public function listadoDTValores() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTValores();
        echo $data;
    }

    public function listadoDTServicios() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTServicios();
        echo $data;
    }

    public function cambiarEstado() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'tabla' => $this->helper->cleanInput($_POST['tabla']),
            'campo' => $this->helper->cleanInput($_POST['campo']),
            'seccion' => $this->helper->cleanInput($_POST['seccion']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->cambiarEstado($datos);
        echo json_encode($data);
    }

    public function modalEditarDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTSlider($data);
        echo $datos;
    }

    public function modalEditarDTQuienesSomos() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTQuienesSomos($data);
        echo $datos;
    }

    public function modalEditarDTHerramientasImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTHerramientasImg($data);
        echo $datos;
    }

    public function modalEditarDTServiciosImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTServiciosImg($data);
        echo $datos;
    }

    public function modalEditarDTDirectoresImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTDirectoresImg($data);
        echo $datos;
    }

    public function modalEditarDTDirectores() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTDirectores($data);
        echo $datos;
    }

    public function modalEditarDTEquipo() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTEquipo($data);
        echo $datos;
    }

    public function modalEditarDTClientes() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTClientes($data);
        echo $datos;
    }

    public function modalEditarDTNoticias() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTNoticias($data);
        echo $datos;
    }

    public function modalEditarDTHerramienta() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTHerramienta($data);
        echo $datos;
    }

    public function modalEditarDTServicios() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTServicios($data);
        echo $datos;
    }

    public function modalEditarDTValores() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTValores($data);
        echo $datos;
    }

    public function frmEditarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarSlider($datos);
        echo json_encode($data);
    }

    public function frmEditarQuienesSomos() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarQuienesSomos($datos);
        echo json_encode($data);
    }

    public function frmEditarHerramientasImg() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarHerramientasImg($datos);
        echo json_encode($data);
    }

    public function frmEditarServiciosImg() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarServiciosImg($datos);
        echo json_encode($data);
    }

    public function frmEditarDirectoresImg() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarDirectoresImg($datos);
        echo json_encode($data);
    }

    public function frmEditarDirectores() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
            'cargo' => (!empty($_POST['cargo'])) ? $this->helper->cleanInput($_POST['cargo']) : NULL,
            'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
            'linkedin' => (!empty($_POST['linkedin'])) ? $this->helper->cleanInput($_POST['linkedin']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarDirectores($datos);
        echo json_encode($data);
    }

    public function frmEditarEquipo() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
            'cargo' => (!empty($_POST['cargo'])) ? $this->helper->cleanInput($_POST['cargo']) : NULL,
            'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarEquipo($datos);
        echo json_encode($data);
    }

    public function frmEditarClientes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
            'tipo' => (!empty($_POST['tipo'])) ? $this->helper->cleanInput($_POST['tipo']) : NULL,
            'descripcion' => (!empty($_POST['descripcion'])) ? $_POST['descripcion'] : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarClientes($datos);
        echo json_encode($data);
    }

    public function frmEditarNoticias() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'fecha' => (!empty($_POST['fecha'])) ? $this->helper->cleanInput($_POST['fecha']) : NULL,
            'youtube' => (!empty($_POST['youtube'])) ? $this->helper->cleanInput($_POST['youtube']) : NULL,
            'vimeo' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['vimeo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarNoticias($datos);
        echo json_encode($data);
    }

    public function frmEditarHerramienta() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarHerramienta($datos);
        echo json_encode($data);
    }

    public function frmEditarServicios() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarServicios($datos);
        echo json_encode($data);
    }

    public function frmEditarValores() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'descripcion' => (!empty($_POST['descripcion'])) ? $this->helper->cleanInput($_POST['descripcion']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarValores($datos);
        echo json_encode($data);
    }

    public function uploadImgSlider() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenSlider($idPost);
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/inicio/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1920;
            $alto = 1200;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSlider($data);
            echo json_encode($response);
        }
    }

    public function uploadImgQuienesSomos() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'quienes_somos_imagenes', $idPost, 'background-quienes_somos');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/background-quienes_somos/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1920;
            $alto = 1200;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgQuienesSomos($data);
            echo json_encode($response);
        }
    }

    public function uploadImgHerramientasImg() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'herramientas_imagenes', $idPost, 'background-herramientas');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/background-herramientas/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1920;
            $alto = 1200;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgHerramientasImg($data);
            echo json_encode($response);
        }
    }

    public function uploadImgServicios() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'servicios_imagenes', $idPost, 'background-servicios');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/background-servicios/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1920;
            $alto = 1200;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgServicios($data);
            echo json_encode($response);
        }
    }

    public function uploadImgDirectoresImg() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'directores_imagenes', $idPost, 'background-directores');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/background-directores/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1920;
            $alto = 1200;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgDirectoresImg($data);
            echo json_encode($response);
        }
    }

    public function uploadImgDirectores() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'directores_personas', $idPost, 'directores');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/directores/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 542;
            $alto = 560;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgDirectores($data);
            echo json_encode($response);
        }
    }

    public function uploadImgEquipo() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'equipo_integrantes', $idPost, 'equipo');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/equipo/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 380;
            $alto = 573;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgEquipo($data);
            echo json_encode($response);
        }
    }

    public function uploadImgClientes() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'clientes_items', $idPost, 'clientes');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/clientes/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 500;
            $alto = 400;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgClientes($data);
            echo json_encode($response);
        }
    }

    public function uploadImgNoticias() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenMultimedia('imagen', 'multimedia_items', $idPost, 'imagenes');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/multimedia/imagenes/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 380;
            $alto = 573;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgNoticias($data);
            echo json_encode($response);
        }
    }

    public function uploadVideoNoticias() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkVideoMultimedia($idPost);
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/multimedia/videos/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'archivo' => $filename
            );
            $response = $this->model->uploadVideoNoticias($data);
            echo json_encode($response);
        }
    }

    public function uploadImgHerramienta() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagen('imagen', 'herramientas_items', $idPost, 'herramientas');
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/herramientas/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 380;
            $alto = 573;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgHerramienta($data);
            echo json_encode($response);
        }
    }

    public function frmEditarIndexSeccion1() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL
        );
        $datos = $this->model->frmEditarIndexSeccion1($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoQuienesSomos() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
            'contenido_mision' => (!empty($_POST['contenido_mision'])) ? $_POST['contenido_mision'] : NULL,
            'contenido_vision' => (!empty($_POST['contenido_vision'])) ? $_POST['contenido_vision'] : NULL,
            'titulo_vision' => (!empty($_POST['titulo_vision'])) ? $_POST['titulo_vision'] : NULL,
            'titulo_mision' => (!empty($_POST['titulo_mision'])) ? $_POST['titulo_mision'] : NULL,
            'fontawesome_vision' => (!empty($_POST['fontawesome_vision'])) ? $_POST['fontawesome_vision'] : NULL,
            'fontawesome_mision' => (!empty($_POST['fontawesome_mision'])) ? $_POST['fontawesome_mision'] : NULL
        );
        $datos = $this->model->frmEditarContenidoQuienesSomos($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoDirectores() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
        );
        $datos = $this->model->frmEditarContenidoDirectores($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoClientes() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
        );
        $datos = $this->model->frmEditarContenidoClientes($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoHerramientas() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
        );
        $datos = $this->model->frmEditarContenidoHerramientas($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoEquipo() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
        );
        $datos = $this->model->frmEditarContenidoEquipo($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoNoticias() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
        );
        $datos = $this->model->frmEditarContenidoNoticias($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoValores() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
        );
        $datos = $this->model->frmEditarContenidoValores($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoServicios() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
        );
        $datos = $this->model->frmEditarContenidoServicios($data);
        echo json_encode($datos);
    }

    public function modalAgregarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarSlider();
        echo json_encode($datos);
    }

    public function modalAgregarQuienesSomos() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarQuienesSomos();
        echo json_encode($datos);
    }

    public function modalAgregarHerramientasImg() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarHerramientasImg();
        echo json_encode($datos);
    }

    public function modalAgregarServiciosImg() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarServiciosImg();
        echo json_encode($datos);
    }

    public function modalAgregarDirectoresImg() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarDirectoresImg();
        echo json_encode($datos);
    }

    public function modalAgregarDirectores() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarDirectores();
        echo json_encode($datos);
    }

    public function modalAgregarEquipo() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarEquipo();
        echo json_encode($datos);
    }

    public function modalAgregarCliente() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarCliente();
        echo json_encode($datos);
    }

    public function modalAgregarNoticias() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarNoticias();
        echo json_encode($datos);
    }

    public function modalAgregarHerramienta() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarHerramienta();
        echo json_encode($datos);
    }

    public function modalAgregarValores() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarValores();
        echo json_encode($datos);
    }

    public function modalAgregarServicios() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarServicios();
        echo json_encode($datos);
    }

    public function frmAgregarSlider() {
        if (!empty($_POST)) {
            $data = array(
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarSlider($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/inicio/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 1920;
                $alto = 1200;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddSliderImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el slider'
            ));
        }
        header('Location:' . URL . 'admin/inicio/');
    }

    public function frmAgregarQuienesSomos() {
        if (!empty($_POST)) {
            $data = array(
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarQuienesSomos($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/background-quienes_somos/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 1920;
                $alto = 1200;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddQuienesSomosImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente la imagen'
            ));
        }
        header('Location:' . URL . 'admin/quienes_somos/');
    }

    public function frmAgregarHerramientasImg() {
        if (!empty($_POST)) {
            $data = array(
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarHerramientasImg($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/background-herramientas/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 1920;
                $alto = 1200;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddHerramientasImgImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente la imagen'
            ));
        }
        header('Location:' . URL . 'admin/herramientas/');
    }

    public function frmAgregarServiciosImg() {
        if (!empty($_POST)) {
            $data = array(
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarServiciosImg($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/background-servicios/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 1920;
                $alto = 1200;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddServiciosImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente la imagen'
            ));
        }
        header('Location:' . URL . 'admin/servicios/');
    }

    public function frmAgregarDirectoresImg() {
        if (!empty($_POST)) {
            $data = array(
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarDirectoresImg($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/background-directores/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 1920;
                $alto = 1200;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddDirectoresImgImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente la imagen'
            ));
        }
        header('Location:' . URL . 'admin/directores/');
    }

    public function frmAgregarDirectores() {
        if (!empty($_POST)) {
            $data = array(
                'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
                'cargo' => (!empty($_POST['cargo'])) ? $this->helper->cleanInput($_POST['cargo']) : NULL,
                'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
                'linkedin' => (!empty($_POST['linkedin'])) ? $this->helper->cleanInput($_POST['linkedin']) : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarDirectores($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/directores/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 542;
                $alto = 560;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddDirectoresImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente al Director'
            ));
        }
        header('Location:' . URL . 'admin/directores/');
    }

    public function frmAgregarEquipo() {
        if (!empty($_POST)) {
            $data = array(
                'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
                'cargo' => (!empty($_POST['cargo'])) ? $this->helper->cleanInput($_POST['cargo']) : NULL,
                'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarEquipo($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/equipo/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 380;
                $alto = 573;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddEquipoImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente al integrante al Equipo'
            ));
        }
        header('Location:' . URL . 'admin/equipo/');
    }

    public function frmAgregarCliente() {
        if (!empty($_POST)) {
            $data = array(
                'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
                'tipo' => (!empty($_POST['tipo'])) ? $this->helper->cleanInput($_POST['tipo']) : NULL,
                'descripcion' => (!empty($_POST['descripcion'])) ? $_POST['descripcion'] : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarCliente($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/clientes/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 500;
                $alto = 400;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddClienteImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el cliente'
            ));
        }
        header('Location:' . URL . 'admin/clientes/');
    }

    public function frmAgregarNoticia() {
        if (!empty($_POST)) {
            $data = array(
                'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
                'youtube' => (!empty($_POST['youtube'])) ? $this->helper->cleanInput($_POST['youtube']) : NULL,
                'vimeo' => (!empty($_POST['vimeo'])) ? $this->helper->cleanInput($_POST['vimeo']) : NULL,
                'fecha' => (!empty($_POST['fecha'])) ? $this->helper->cleanInput($_POST['fecha']) : NULL,
                'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarNoticia($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/multimedia/imagenes/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 380;
                $alto = 573;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddMultimediaImg($imagenes);
            }
            #VIDEOS
            if (!empty($_FILES['file_video']['name'])) {
                $error = false;
                $dir = 'public/multimedia/videos/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_video']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_video']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                $video = array(
                    'id' => $idPost,
                    'archivo' => $fname
                );
                $this->model->frmAddMultimediaVideo($video);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente la Noticia'
            ));
        }
        header('Location:' . URL . 'admin/noticias/');
    }

    public function frmAgregarHerramienta() {
        if (!empty($_POST)) {
            $data = array(
                'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
                'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarHerramienta($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/herramientas/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 150;
                $alto = 150;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddHerramientaImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente la imagen'
            ));
        }
        header('Location:' . URL . 'admin/equipo/');
    }

    public function frmAgregarValores() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'descripcion' => (!empty($_POST['descripcion'])) ? $this->helper->cleanInput($_POST['descripcion']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarValores($datos);
        echo json_encode($data);
    }

    public function frmAgregarServicios() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarServicios($datos);
        echo json_encode($data);
    }

    public function listadoDTUsuarios() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTUsuarios();
        echo $data;
    }

    public function modalEditarDTUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTUsuario($data);
        echo $datos;
    }

    public function frmEditarUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'nombre' => $this->helper->cleanInput($_POST['nombre']),
            'email' => $this->helper->cleanInput($_POST['email']),
            'id_rol' => $this->helper->cleanInput($_POST['id_usuario_rol']),
            'contrasena' => (!empty($_POST['contrasena'])) ? $this->helper->cleanInput($_POST['contrasena']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $data = $this->model->frmEditarUsuario($datos);
        echo json_encode($data);
    }

    public function modalAgregarUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarUsuario();
        echo json_encode($datos);
    }

    public function frmAgregarUsuario() {
        if (!empty($_POST)) {
            $data = array(
                'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
                'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
                'id_rol' => (!empty($_POST['id_usuario_rol'])) ? $this->helper->cleanInput($_POST['id_usuario_rol']) : NULL,
                'contrasena' => (!empty($_POST['contrasena'])) ? $this->helper->cleanInput($_POST['contrasena']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $id = $this->model->frmAgregarUsuario($data);
            if (!empty($id)) {
                Session::set('message', array(
                    'type' => 'success',
                    'mensaje' => 'Se ha agregado correctamente el usuario'
                ));
            } else {
                Session::set('message', array(
                    'type' => 'error',
                    'mensaje' => 'Lo sentimos, ha ocurrido un error inesperado.'
                ));
            }
        }
        header('Location:' . URL . $this->idioma . '/admin/usuarios/');
    }

    public function modalEditarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarRedes($data);
        echo $datos;
    }

    public function frmEditarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'descripcion' => $this->helper->cleanInput($_POST['descripcion']),
            'url' => $this->helper->cleanInput($_POST['url']),
            'fontawesome' => $this->helper->cleanInput($_POST['fontawesome']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarRedes($datos);
        echo json_encode($data);
    }

    public function modalAgregarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarRedes();
        echo json_encode($datos);
    }

    public function frmAgregarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'descripcion' => (!empty($_POST['descripcion'])) ? $this->helper->cleanInput($_POST['descripcion']) : NULL,
            'url' => (!empty($_POST['url'])) ? $this->helper->cleanInput($_POST['url']) : NULL,
            'fontawesome' => (!empty($_POST['fontawesome'])) ? $this->helper->cleanInput($_POST['fontawesome']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarRedes($datos);
        echo json_encode($data);
    }

    public function modalEditarMenu() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarMenu($data);
        echo $datos;
    }

    public function frmEditarMenu() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'descripcion' => (!empty($_POST['descripcion'])) ? $this->helper->cleanInput($_POST['descripcion']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarMenu($datos);
        echo json_encode($data);
    }
    
    
}
