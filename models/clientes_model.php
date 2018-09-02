<?php

class Clientes_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function cliente($id) {
        $sql = $this->db->select("SELECT * FROM `clientes_items` where id = $id;");
        $data = '<section>
                    <div class="view gallery-page">
                        <div class="content">
                            <div class="view-wrapper">
                                <div class="view">
                                    <div class="item-content">
                                        <div class="container">
                                            <h3>' . utf8_encode($sql[0]['nombre']) . '</h3>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <img class="fluid-width" alt="Project 1" src="' . URL . 'public/images/clientes/' . utf8_encode($sql[0]['imagen']) . '" />
                                                </div>
                                                <div class="col-md-3">
                                                    ' . utf8_encode($sql[0]['descripcion']) . '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';
        return $data;
    }

    public function contacto($datos) {
        $data = array();
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $mensaje = $datos['mensaje'];
        if ((!empty($nombre)) && (!empty($email)) && (!empty($mensaje))) {
            $this->db->insert('frm_contacto', array(
                'nombre' => utf8_decode($nombre),
                'email' => $email,
                'mensaje' => utf8_decode($mensaje),
                'ip' => $this->helper->getReal_ip(),
                'fecha' => date('Y-m-d H:i:s'),
            ));
            $asunto = 'Formulario de Contacto';
            $message = "Este mensaje fue enviado por " . $nombre . chr(10) . chr(13);
            $message .= "Desde la sgte Ip: " . $this->helper->getReal_ip() . chr(10) . chr(13);
            $message .= "E-mail: " . $email . chr(10) . chr(13);
            $message .= "Mensaje:" . $mensaje . chr(10) . chr(13);
            $message .= "Enviado el " . date('Y-m-d H:i:s');
            $this->helper->sendMail($email, $asunto, $message);
            $data = '<i class="fa fa-check-circle-o" aria-hidden="true" style="font-size: 25px;"></i> Gracias por ponerte en contacto con nosotros. Su mensaje ha sido enviado.';
            return $data;
        }
    }

}
