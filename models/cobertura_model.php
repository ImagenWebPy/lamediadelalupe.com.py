<?php

class Cobertura_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function contenido() {
        $sql = $this->db->select("SELECT * FROM cobertura where id = 1;");
        return $sql[0];
    }

    public function ubicaciones() {
        $sql = $this->db->select("SELECT latitud,longitud, principal, descripcion FROM `cobertura_ubicaciones` where estado = 1;");
        $data = array(
            'ubicaciones' => array(),
            'principal' => array()
        );
        foreach ($sql as $item) {
            if ($item['principal'] == 0) {
                array_push($data['ubicaciones'], array('latitud' => $item['latitud'], 'longitud' => $item['longitud'], 'descripcion' => utf8_encode($item['descripcion'])));
            } else {
                $data['principal'] = array('latitud' => $item['latitud'], 'longitud' => $item['longitud']);
            }
        }
        return $data;
    }

}
