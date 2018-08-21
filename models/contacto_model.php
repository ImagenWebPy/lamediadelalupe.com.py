<?php

class Contacto_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function contenido() {
        $sql = $this->db->select("SELECT * FROM contacto where id = 1;");
        return $sql[0];
    }

}
