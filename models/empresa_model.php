<?php

class Empresa_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function contenido() {
        $sql = $this->db->select("SELECT
                                        contenido,
                                        header_img,
                                        header_titulo
                                FROM
                                        empresa
                                WHERE
                                        id = 1");
        return $sql[0];
    }

}
