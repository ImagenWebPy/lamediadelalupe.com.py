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

}
