<?php

class Carteles_tradicionales_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function contenido($seccion) {
        $sql = $this->db->select("SELECT
                                        contenido,
                                        header_img,
                                        header_titulo
                                FROM
                                        carteles_tradicionales
                                WHERE
                                        seccion = '$seccion'");
        return $sql[0];
    }

    public function cargarContenidoAsuncion($pagina) {
        $page = 1;
        if (!empty($pagina)) {
            $page = $pagina;
        }
        $style = 'style="float: left;"';
        $setLimit = CANT_REG;
        $pageLimit = ($setLimit * $page) - $setLimit;
        $tabla = '';
        $where = '';
        $sql = $this->db->select("SELECT
                                        descripcion,
                                        imagen
                                FROM
                                        carteles_tradicionales_img
                                WHERE
                                        id_carteles_tradicionales = 1
                                AND estado = 1
                                ORDER BY orden ASC
                                LIMIT $pageLimit, $setLimit");
        $condicion = 'FROM
                            carteles_tradicionales_img
                    WHERE
                            id_carteles_tradicionales = 1
                    AND estado = 1';
        $div = '';
        if (!empty($sql)) {
            foreach ($sql as $item) {
                $div .= '<!-- start portfolio-item item -->
                        <li class="grid-item web branding design wow fadeInUp" ' . $style . '>
                            <a href="#">
                                <figure>
                                    <div class="portfolio-img bg-extra-dark-gray"><img src="' . URL . 'public/images/carteles_tradicionales/' . $item['imagen'] . '" alt=""/></div>
                                    <figcaption>
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <div class="bg-deep-pink center-col separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                    <p class="text-medium-gray text-uppercase text-extra-small no-margin-bottom">' . utf8_encode($item['descripcion']) . '</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <!-- end portfolio item -->';
            }
            $paginador = $this->helper->mostrarPaginador($setLimit, $page, 'carteles_tradicionales_img', 'carteles_tradicionales', 'cargarContenidoAsuncion', $condicion, TRUE);
        }
        $data = array(
            'contenido' => $div,
            'paginador' => $paginador
        );
        return $data;
    }
    
    public function cargarContenidoGranAsuncion($pagina) {
        $page = 1;
        if (!empty($pagina)) {
            $page = $pagina;
        }
        $style = 'style="float: left;"';
        $setLimit = CANT_REG;
        $pageLimit = ($setLimit * $page) - $setLimit;
        $tabla = '';
        $where = '';
        $sql = $this->db->select("SELECT
                                        descripcion,
                                        imagen
                                FROM
                                        carteles_tradicionales_img
                                WHERE
                                        id_carteles_tradicionales = 2
                                AND estado = 1
                                ORDER BY orden ASC
                                LIMIT $pageLimit, $setLimit");
        $condicion = 'FROM
                            carteles_tradicionales_img
                    WHERE
                            id_carteles_tradicionales = 2
                    AND estado = 1';
        $div = '';
        if (!empty($sql)) {
            foreach ($sql as $item) {
                $div .= '<!-- start portfolio-item item -->
                        <li class="grid-item web branding design wow fadeInUp" ' . $style . '>
                            <a href="#">
                                <figure>
                                    <div class="portfolio-img bg-extra-dark-gray"><img src="' . URL . 'public/images/carteles_tradicionales/' . $item['imagen'] . '" alt=""/></div>
                                    <figcaption>
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <div class="bg-deep-pink center-col separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                    <p class="text-medium-gray text-uppercase text-extra-small no-margin-bottom">' . utf8_encode($item['descripcion']) . '</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <!-- end portfolio item -->';
            }
            $paginador = $this->helper->mostrarPaginador($setLimit, $page, 'carteles_tradicionales_img', 'carteles_tradicionales', 'cargarContenidoGranAsuncion', $condicion, TRUE);
        }
        $data = array(
            'contenido' => $div,
            'paginador' => $paginador
        );
        return $data;
    }
    
    public function cargarContenidoRuteros($pagina) {
        $page = 1;
        if (!empty($pagina)) {
            $page = $pagina;
        }
        $style = 'style="float: left;"';
        $setLimit = CANT_REG;
        $pageLimit = ($setLimit * $page) - $setLimit;
        $tabla = '';
        $where = '';
        $sql = $this->db->select("SELECT
                                        descripcion,
                                        imagen
                                FROM
                                        carteles_tradicionales_img
                                WHERE
                                        id_carteles_tradicionales = 3
                                AND estado = 1
                                ORDER BY orden ASC
                                LIMIT $pageLimit, $setLimit");
        $condicion = 'FROM
                            carteles_tradicionales_img
                    WHERE
                            id_carteles_tradicionales = 3
                    AND estado = 1';
        $div = '';
        if (!empty($sql)) {
            foreach ($sql as $item) {
                $div .= '<!-- start portfolio-item item -->
                        <li class="grid-item web branding design wow fadeInUp" ' . $style . '>
                            <a href="#">
                                <figure>
                                    <div class="portfolio-img bg-extra-dark-gray"><img src="' . URL . 'public/images/carteles_tradicionales/' . $item['imagen'] . '" alt=""/></div>
                                    <figcaption>
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <div class="bg-deep-pink center-col separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                    <p class="text-medium-gray text-uppercase text-extra-small no-margin-bottom">' . utf8_encode($item['descripcion']) . '</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <!-- end portfolio item -->';
            }
            $paginador = $this->helper->mostrarPaginador($setLimit, $page, 'carteles_tradicionales_img', 'carteles_tradicionales', 'cargarContenidoRuteros', $condicion, TRUE);
        }
        $data = array(
            'contenido' => $div,
            'paginador' => $paginador
        );
        return $data;
    }
    
    public function cargarContenidoUrbanos($pagina) {
        $page = 1;
        if (!empty($pagina)) {
            $page = $pagina;
        }
        $style = 'style="float: left;"';
        $setLimit = CANT_REG;
        $pageLimit = ($setLimit * $page) - $setLimit;
        $tabla = '';
        $where = '';
        $sql = $this->db->select("SELECT
                                        descripcion,
                                        imagen
                                FROM
                                        carteles_tradicionales_img
                                WHERE
                                        id_carteles_tradicionales = 4
                                AND estado = 1
                                ORDER BY orden ASC
                                LIMIT $pageLimit, $setLimit");
        $condicion = 'FROM
                            carteles_tradicionales_img
                    WHERE
                            id_carteles_tradicionales = 4
                    AND estado = 1';
        $div = '';
        if (!empty($sql)) {
            foreach ($sql as $item) {
                $div .= '<!-- start portfolio-item item -->
                        <li class="grid-item web branding design wow fadeInUp" ' . $style . '>
                            <a href="#">
                                <figure>
                                    <div class="portfolio-img bg-extra-dark-gray"><img src="' . URL . 'public/images/carteles_tradicionales/' . $item['imagen'] . '" alt=""/></div>
                                    <figcaption>
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <div class="bg-deep-pink center-col separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                    <p class="text-medium-gray text-uppercase text-extra-small no-margin-bottom">' . utf8_encode($item['descripcion']) . '</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <!-- end portfolio item -->';
            }
            $paginador = $this->helper->mostrarPaginador($setLimit, $page, 'carteles_tradicionales_img', 'carteles_tradicionales', 'cargarContenidoUrbanos', $condicion, TRUE);
        }
        $data = array(
            'contenido' => $div,
            'paginador' => $paginador
        );
        return $data;
    }

}
