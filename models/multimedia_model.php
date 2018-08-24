<?php

class Multimedia_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function contenido($id) {
        $sql = $this->db->select("SELECT * FROM `multimedia_items` where id = $id;");
        $data = '<section>
            <div class="view gallery-page">
                <div class="content">
                    <div class="view-wrapper">
                        <div class="view">
                            <div class="item-content">
                                <div class="container">
                                    <h3>' . utf8_encode($sql[0]['titulo']) . '</h3>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="fluid">';
        if (!empty($sql[0]['archivo'])) {
            $data .= '                      <video controls>
                                                <source src="' . URL . 'public/multimedia/videos/' . $sql[0]['archivo'] . '" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />
                                            </video>';
        }
        if (!empty($sql[0]['youtube'])) {
            $data .= '                          <iframe width="853" height="480" src="https://www.youtube.com/embed/' . $sql[0]['youtube'] . '" allowfullscreen></iframe>';
        }
        if (!empty($sql[0]['vimeo'])) {
            $data .= '                          <iframe src="https://player.vimeo.com/video/' . $sql[0]['vimeo'] . '?portrait=0" width="730" height="411" allowfullscreen></iframe>';
        }
        $data .= '                          </div>
                                        </div>
                                        <div class="col-md-3">
                                            ' . utf8_encode($sql[0]['contenido']) . '
                                            <p><span class="field">Fecha:</span> ' . date('d-m-Y', strtotime($sql[0]['fecha'])) . '</p>
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
