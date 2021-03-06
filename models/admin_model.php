<?php

class Admin_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function cambiarEstado($datos) {
        $id = $datos['id'];
        $tabla = $datos['tabla'];
        $campo = $datos['campo'];
        $seccion = $datos['seccion'];
        $estado = $datos['estado'];
        #Actualizamos el estado de acuerdo al valor actual
        if ($estado == 1)
            $newEstado = 0;
        else
            $newEstado = 1;
        $update = array(
            $campo => $newEstado
        );
        $this->db->update($tabla, $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable($seccion, $tabla, $id)
        );
        return $data;
    }

    private function rowDataTable($seccion, $tabla, $id) {
        $data = '';
        switch ($tabla) {
            case 'usuario':
                $sql = $this->db->select("SELECT
                                                wa.id,
                                                wa.nombre,
                                                wa.email,
                                                wr.descripcion AS rol,
                                                wa.estado
                                        FROM
                                                usuario wa
                                        LEFT JOIN rol wr ON wr.id = wa.id_rol WHERE wa.id = $id;");
                break;
            default :
                $sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
                break;
        }
        switch ($seccion) {
            case 'verContacto':
                if ($sql[0]['leido'] == 1) {
                    $estado = '<span class="label label-primary">Leído</span>';
                } else {
                    $estado = '<span class="label label-danger">No Leído</span>';
                }
                $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
                $data = '<td class="sorting_1">' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . date('d-m-Y H:i:s', strtotime($sql[0]['nombre'])) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'slider':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="inicio_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="inicio_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/inicio/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'directores_img':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores_img" data-rowid="directores_img_" data-tabla="directores_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores_img" data-rowid="directores_img_" data-tabla="directores_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTDirectoresImg"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/background-directores/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '-';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'directores':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores" data-rowid="directores_" data-tabla="directores_personas" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores" data-rowid="directores_" data-tabla="directores_personas" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTDirectores"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['cargo']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'equipo':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="equipo" data-rowid="equipo_" data-tabla="equipo_integrantes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="equipo" data-rowid="equipo_" data-tabla="equipo_integrantes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTEquipo"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['cargo']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'clientes':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="clientes" data-rowid="clientes_" data-tabla="clientes_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="clientes" data-rowid="clientes_" data-tabla="clientes_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTClientes"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['tipo']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'noticias':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="noticias" data-rowid="noticia_" data-tabla="multimedia_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="noticias" data-rowid="noticia_" data-tabla="multimedia_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTNoticias"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['id'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
                        . '<td>' . date('d-m-Y', strtotime($sql[0]['fecha'])) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'herramienta':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramienta" data-rowid="herramienta_" data-tabla="herramientas_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramienta" data-rowid="herramienta_" data-tabla="herramientas_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTHerramienta"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'servicios':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="servicios_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="servicios_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTServicios"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'valores':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="valores" data-rowid="valores_" data-tabla="valores_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="valores" data-rowid="valores_" data-tabla="valores_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTValores"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'quienes_somos':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="quienes_somos" data-rowid="quienesSomos_" data-tabla="quienes_somos_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="quienes_somos" data-rowid="quienesSomos_" data-tabla="quienes_somos_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTQuienesSomos"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/background-quienes_somos/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '-';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'contacto_img':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="contacto_img" data-rowid="contactoImg_" data-tabla="contacto_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="contacto_img" data-rowid="contactoImg_" data-tabla="contacto_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTContactoImg"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/background-contacto/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '-';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'herramientas_img':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramientas_img" data-rowid="herramientasImg_" data-tabla="herramientas_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramientas_img" data-rowid="herramientasImg_" data-tabla="herramientas_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTHerramientasImg"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/background-herramientas/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '-';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'servicios_img':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios_img" data-rowid="servicios_img_" data-tabla="servicios_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios_img" data-rowid="servicios_img_" data-tabla="servicios_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTServiciosImg"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/background-servicios/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '-';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'redes':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarRedes"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['url']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'usuarios':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUsuario"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['rol']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'menu':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="menu" data-rowid="menu_" data-tabla="menu" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="menu" data-rowid="menu_" data-tabla="menu" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarMenu"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
        }
        return $data;
    }

    public function listadoDTSlider() {
        $sql = $this->db->select("SELECT * FROM inicio_imagenes ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="inicio_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="inicio_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/inicio/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "slider_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTQuienesSomos() {
        $sql = $this->db->select("SELECT * FROM quienes_somos_imagenes ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="quienes_somos" data-rowid="quienesSomos_" data-tabla="quienes_somos_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="quienes_somos" data-rowid="quienesSomos_" data-tabla="quienes_somos_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTQuienesSomos"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/background-quienes_somos/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "quienesSomos_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTImgContacto() {
        $sql = $this->db->select("SELECT * FROM contacto_imagenes ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="contacto_img" data-rowid="contactoImg_" data-tabla="contacto_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="contacto_img" data-rowid="contactoImg_" data-tabla="contacto_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTContactoImg"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/background-contacto/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "contactoImg_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTHerramientasImg() {
        $sql = $this->db->select("SELECT * FROM herramientas_imagenes ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramientas_img" data-rowid="herramientasImg_" data-tabla="herramientas_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramientas_img" data-rowid="herramientasImg_" data-tabla="herramientas_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTHerramientasImg"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/background-herramientas/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "herramientasImg_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTServiciosImg() {
        $sql = $this->db->select("SELECT * FROM servicios_imagenes ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios_img" data-rowid="servicios_img_" data-tabla="servicios_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios_img" data-rowid="servicios_img_" data-tabla="servicios_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTServiciosImg"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/background-servicios/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "servicios_img_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTDirectoresImg() {
        $sql = $this->db->select("SELECT * FROM directores_imagenes ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores_img" data-rowid="directores_img_" data-tabla="directores_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores_img" data-rowid="directores_img_" data-tabla="directores_imagenes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTDirectoresImg"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/background-directores/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "directores_img_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTDirectores() {
        $sql = $this->db->select("SELECT * FROM directores_personas ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores" data-rowid="directores_" data-tabla="directores_personas" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="directores" data-rowid="directores_" data-tabla="directores_personas" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTDirectores"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "directores_$id",
                'orden' => $item['orden'],
                'nombre' => utf8_encode($item['nombre']),
                'cargo' => utf8_encode($item['cargo']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTEquipo() {
        $sql = $this->db->select("SELECT * FROM equipo_integrantes ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="equipo" data-rowid="equipo_" data-tabla="equipo_integrantes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="equipo" data-rowid="equipo_" data-tabla="equipo_integrantes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTEquipo"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "equipo_$id",
                'orden' => $item['orden'],
                'nombre' => utf8_encode($item['nombre']),
                'cargo' => utf8_encode($item['cargo']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTClientes() {
        $sql = $this->db->select("SELECT * FROM clientes_items ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="clientes" data-rowid="clientes_" data-tabla="clientes_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="clientes" data-rowid="clientes_" data-tabla="clientes_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTClientes"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "clientes_$id",
                'orden' => $item['orden'],
                'nombre' => utf8_encode($item['nombre']),
                'tipo' => utf8_encode($item['tipo']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTNoticias() {
        $sql = $this->db->select("SELECT * FROM multimedia_items ORDER BY fecha DESC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="noticias" data-rowid="noticia_" data-tabla="multimedia_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="noticias" data-rowid="noticia_" data-tabla="multimedia_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTNoticias"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "noticia_$id",
                'id' => $item['id'],
                'titulo' => utf8_encode($item['titulo']),
                'fecha' => date('d-m-Y', strtotime($item['fecha'])),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTHerramientas() {
        $sql = $this->db->select("SELECT * FROM herramientas_items ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramienta" data-rowid="herramienta_" data-tabla="herramientas_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="herramienta" data-rowid="herramienta_" data-tabla="herramientas_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTHerramienta"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "herramienta_$id",
                'orden' => $item['orden'],
                'titulo' => utf8_encode($item['titulo']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTValores() {
        $sql = $this->db->select("SELECT * FROM valores_items ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="valores" data-rowid="valores_" data-tabla="valores_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="valores" data-rowid="valores_" data-tabla="valores_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTValores"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "valores_$id",
                'orden' => $item['orden'],
                'descripcion' => utf8_encode($item['descripcion']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTServicios() {
        $sql = $this->db->select("SELECT * FROM servicios_items ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="servicios_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="servicios_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTServicios"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "servicios_$id",
                'orden' => $item['orden'],
                'titulo' => utf8_encode($item['titulo']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarDTSlider($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from inicio_imagenes where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagen Inicio</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarSlider" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 1920 x 1200px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileSlider" data-max-filesize="2048000" data-url="' . URL . '/admin/uploadImgSlider" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileSlider").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgSlider" + response.id).html(response.content);
                                        $("#slider_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgSlider' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/inicio/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Slider',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTQuienesSomos($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from quienes_somos_imagenes where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagen de Fondo</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarQuienesSomos" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 1920 x 1200px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileQuienesSomos" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgQuienesSomos" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileQuienesSomos").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgQuienesSomos" + response.id).html(response.content);
                                        $("#quienesSomos_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgQuienesSomos' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/background-quienes_somos/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Imagen de Fondo - Quienes Somos',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTContactoImg($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from contacto_imagenes where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagen de Fondo</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarContactoImg" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 1920 x 1200px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileContactoImg" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgContactoImg" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileContactoImg").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgContactoImg" + response.id).html(response.content);
                                        $("#contactoImg_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgContactoImg' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/background-contacto/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Imagen de Fondo - Quienes Somos',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTHerramientasImg($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from herramientas_imagenes where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagen de Fondo</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarHerramientasImg" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 1920 x 1200px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileHierramientasImg" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgHerramientasImg" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileHierramientasImg").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgHerramientasImg" + response.id).html(response.content);
                                        $("#herramientasImg_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgHerramientasImg' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/background-herramientas/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Imagen de Fondo - Herramientas',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTServiciosImg($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from servicios_imagenes where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagen de Fondo</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarServiciosImg" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 1920 x 1200px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileServiciosImg" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgServicios" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileServiciosImg").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgServicios" + response.id).html(response.content);
                                        $("#servicios_img_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgServicios' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/background-servicios/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Imagen de Fondo - Servicios',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTDirectoresImg($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from directores_imagenes where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagenes</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarDirectoresImg" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 1920 x 1200px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileDirectoresImg" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgDirectoresImg" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileDirectoresImg").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgDirectoresImg" + response.id).html(response.content);
                                        $("#directores_img_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgDirectoresImg' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/background-directores/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Imagen de Fondo - Directores',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTDirectores($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from directores_personas where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagenes</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarDirectores" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['nombre']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" name="cargo" class="form-control" placeholder="Cargo" value="' . utf8_encode($sql[0]['cargo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="' . utf8_encode($sql[0]['email']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" placeholder="Linkedin" value="' . utf8_encode($sql[0]['linkedin']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 542 x 560px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileDirectores" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgDirectores" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileDirectores").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgDirectores" + response.id).html(response.content);
                                        $("#directores_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgDirectores' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/directores/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar datos Directores',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTEquipo($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from equipo_integrantes where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagenes</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarEquipo" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['nombre']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" name="cargo" class="form-control" placeholder="Cargo" value="' . utf8_encode($sql[0]['cargo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="' . utf8_encode($sql[0]['email']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 380 x 573px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileEquipo" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgEquipo" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileEquipo").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgEquipo" + response.id).html(response.content);
                                        $("#equipo_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgEquipo' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/equipo/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar datos Equipo',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTClientes($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from clientes_items where id = $id");
        $tipos = $this->helper->getEnumOptions('clientes_items', 'tipo');
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagenes</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarClientes" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['nombre']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control m-b" name="tipo" required> 
                                            <option value="">Seleccione un Rol</option>';
        foreach ($tipos as $item) {
            $selected = ($item == $sql[0]['tipo']) ? 'selected' : '';
            $modal .= '                     <option value="' . $item . '" ' . $selected . '>' . $item . '</option>';
        }
        $modal .= '                </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="descripcion" class="summernote">' . utf8_encode($sql[0]['descripcion']) . '</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 500 x 400px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileClientes" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgClientes" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileClientes").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgClientes" + response.id).html(response.content);
                                        $("#clientes_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgClientes' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/clientes/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar datos Cliente',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTNoticias($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from multimedia_items where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagenes</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarNoticias" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="' . utf8_encode($sql[0]['titulo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>YouTube ID</label>
                                        <input type="text" name="youtube" class="form-control" placeholder="Titulo" value="' . utf8_encode($sql[0]['youtube']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vimeo ID</label>
                                        <input type="text" name="vimeo" class="form-control" placeholder="Titulo" value="' . utf8_encode($sql[0]['vimeo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_1">
                                        <label class="font-normal">Fecha Publicación</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha" value="' . date('d/m/Y', strtotime($sql[0]['fecha'])) . '">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote">' . utf8_encode($sql[0]['contenido']) . '</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 500 x 400px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileNoticiasImg" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgNoticias" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileNoticiasImg").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgNoticias" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgNoticias' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/multimedia/imagenes/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Video</h3>
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Detalles de la imagen a subir:<br>
                                    -Formato: MP4<br>
                                    -Dimensión: 480,720,1920
                                    -Tamaño: Hasta 40MB<br>
                                </div>
                                <div class="html5fileupload fileNoticiasVideo" data-max-filesize="40960000" data-url="' . URL . 'admin/uploadVideoNoticias" data-valid-extensions="mp4,MP4" style="width: 100%;">
                                    <input type="file" name="file_video" />
                                </div>
                                <script>
                                    $(".html5fileupload.fileNoticiasVideo").html5fileupload({
                                        data: {id: ' . $id . '},
                                        onAfterStartSuccess: function (response) {
                                            $("#imgVideos" + response.id).html(response.content);
                                        }
                                    });
                                </script>
                            </div>
                            <div class="col-md-12" id="imgVideos' . $id . '">';
        if (!empty($sql[0]['archivo'])) {
            $modal .= '         <video controls>
                                    <source src="' . URL . 'public/multimedia/videos/' . $sql[0]['archivo'] . '" type="video/mp4">
                                </video>';
        }
        $modal .= '         </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar datos Equipo',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalAgregarNoticias() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Noticia</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . 'admin/frmAgregarNoticia" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>YouTube ID</label>
                                        <input type="text" name="youtube" class="form-control" placeholder="Titulo" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vimeo ID</label>
                                        <input type="text" name="vimeo" class="form-control" placeholder="Titulo" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_1">
                                        <label class="font-normal">Fecha Publicación</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="col-md-12">
                                <h3>Imagen</h3>
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Detalles de la imagen a subir:<br>
                                    -Formato: JPG,PNG<br>
                                    -Dimensión: Imagen Normal: 500 x 400px<br>
                                    -Tamaño: Hasta 2MB<br>
                                    <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                </div>
                                <div class="html5fileupload fileNoticiasImg" data-form="true" data-max-filesize="2048000" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                    <input type="file" name="file_archivo" />
                                </div>
                                <script>
                                    $(".html5fileupload.fileNoticiasImg").html5fileupload();
                                </script>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <h3>Video</h3>
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Detalles de la imagen a subir:<br>
                                    -Formato: MP4<br>
                                    -Dimensión: 480,720,1920
                                    -Tamaño: Hasta 40MB<br>
                                </div>
                                <div class="html5fileupload fileNoticiasVideo" data-form="true" data-max-filesize="40960000" data-valid-extensions="mp4,MP4" style="width: 100%;">
                                    <input type="file" name="file_video" />
                                </div>
                                <script>
                                    $(".html5fileupload.fileNoticiasVideo").html5fileupload();
                                </script>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Noticia',
            'content' => $modal
        );
        return $data;
    }

    public function modalEditarDTHerramienta($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from herramientas_items where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagenes</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarHerramienta" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="' . utf8_encode($sql[0]['titulo']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote">' . utf8_encode($sql[0]['contenido']) . '</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 150 x 150px<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileHerramienta" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgHerramienta" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileHerramienta").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgHerramienta" + response.id).html(response.content);
                                        $("#herramienta_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgHerramienta' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/herramientas/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar datos Equipo',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTServicios($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from servicios_items where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarServicios" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="' . utf8_encode($sql[0]['titulo']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote">' . utf8_encode($sql[0]['contenido']) . '</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar datos Servicio',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTValores($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from valores_items where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos Imagenes</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarValores" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar datos Valores',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarSlider($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('inicio_imagenes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('slider', 'inicio_imagenes', $id),
            'message' => 'Se ha actualizado el contenido de la imagen de Inicio'
        );
        return $data;
    }

    public function frmEditarQuienesSomos($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('quienes_somos_imagenes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('quienes_somos', 'quienes_somos_imagenes', $id),
            'message' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarContactoImg($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('contacto_imagenes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('contacto_img', 'contacto_imagenes', $id),
            'message' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarHerramientasImg($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('herramientas_imagenes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('herramientas_img', 'herramientas_imagenes', $id),
            'message' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarServiciosImg($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('servicios_imagenes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('servicios_img', 'servicios_imagenes', $id),
            'message' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarDirectoresImg($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('directores_imagenes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('directores_img', 'directores_imagenes', $id),
            'message' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarDirectores($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'nombre' => utf8_decode($datos['nombre']),
            'cargo' => utf8_decode($datos['cargo']),
            'email' => utf8_decode($datos['email']),
            'linkedin' => utf8_decode($datos['linkedin']),
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('directores_personas', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('directores', 'directores_personas', $id),
            'message' => 'Se ha actualizado el contenido del Director "' . $datos['nombre'] . '"'
        );
        return $data;
    }

    public function frmEditarEquipo($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'nombre' => utf8_decode($datos['nombre']),
            'cargo' => utf8_decode($datos['cargo']),
            'email' => utf8_decode($datos['email']),
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('equipo_integrantes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('equipo', 'equipo_integrantes', $id),
            'message' => 'Se ha actualizado el contenido del integrante "' . $datos['nombre'] . '"'
        );
        return $data;
    }

    public function frmEditarClientes($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'nombre' => utf8_decode($datos['nombre']),
            'tipo' => utf8_decode($datos['tipo']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('clientes_items', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('clientes', 'clientes_items', $id),
            'message' => 'Se han actualizado los datos del cliente "' . $datos['nombre'] . '"'
        );
        return $data;
    }

    public function frmEditarNoticias($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $fecha = $datos['fecha'];
        $fecha = str_replace('/', '-', $fecha);
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'fecha' => date('Y-m-d', strtotime($fecha)),
            'youtube' => utf8_decode($datos['youtube']),
            'vimeo' => utf8_decode($datos['vimeo']),
            'contenido' => utf8_decode($datos['contenido']),
            'estado' => $estado
        );
        $this->db->update('multimedia_items', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('noticias', 'multimedia_items', $id),
            'message' => 'Se ha actualizado el contenido de la noticia "' . $datos['titulo'] . '"'
        );
        return $data;
    }

    public function frmEditarHerramienta($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('herramientas_items', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('herramienta', 'herramientas_items', $id),
            'message' => 'Se ha actualizado el contenido de la herramienta "' . $datos['titulo'] . '"'
        );
        return $data;
    }

    public function frmEditarServicios($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('servicios_items', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('servicios', 'servicios_items', $id),
            'message' => 'Se ha actualizado el contenido del servicio "' . $datos['titulo'] . '"'
        );
        return $data;
    }

    public function frmEditarValores($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('valores_items', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('valores', 'valores_items', $id),
            'mensaje' => 'Se ha actualizado el contenido del valor "' . $datos['descripcion'] . '"'
        );
        return $data;
    }

    public function uploadImgSlider($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('inicio_imagenes', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/inicio/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('slider', 'inicio_imagenes', $id)
        );
        return $data;
    }

    public function uploadImgQuienesSomos($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('quienes_somos_imagenes', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/background-quienes_somos/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('quienes_somos', 'quienes_somos_imagenes', $id)
        );
        return $data;
    }

    public function uploadImgContactoImg($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('contacto_imagenes', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/background-contacto/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('contacto_img', 'contacto_imagenes', $id)
        );
        return $data;
    }

    public function uploadImgHerramientasImg($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('herramientas_imagenes', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/background-herramientas/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('herramientas_img', 'herramientas_imagenes', $id)
        );
        return $data;
    }

    public function uploadImgServicios($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('servicios_imagenes', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/background-servicios/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('servicios_img', 'servicios_imagenes', $id)
        );
        return $data;
    }

    public function uploadImgDirectoresImg($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('directores_imagenes', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/background-directores/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('directores_img', 'directores_imagenes', $id)
        );
        return $data;
    }

    public function uploadImgDirectores($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('directores_personas', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/directores/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('directores', 'directores_personas', $id)
        );
        return $data;
    }

    public function uploadImgEquipo($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('equipo_integrantes', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/equipo/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('equipo', 'equipo_integrantes', $id)
        );
        return $data;
    }

    public function uploadImgClientes($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('clientes_items', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/clientes/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('clientes', 'clientes_items', $id)
        );
        return $data;
    }

    public function uploadImgNoticias($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('multimedia_items', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/multimedia/imagenes/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('noticias', 'multimedia_items', $id)
        );
        return $data;
    }

    public function uploadVideoNoticias($datos) {
        $id = $datos['id'];
        $update = array(
            'archivo' => $datos['archivo']
        );
        $this->db->update('multimedia_items', $update, "id = $id");
        $contenido = '<video controls>
                                    <source src="' . URL . 'public/multimedia/videos/' . $datos['archivo'] . '" type="video/mp4">
                                </video>';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('noticias', 'multimedia_items', $id)
        );
        return $data;
    }

    public function uploadImgHerramienta($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('herramientas_items', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/herramientas/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('herramienta', 'herramientas_items', $id)
        );
        return $data;
    }

    public function unlinkImagenSlider($id) {
        $sql = $this->db->select("select imagen from inicio_imagenes where id = $id");
        $dir = 'public/images/inicio/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['imagen'])) {
                unlink($dir . $sql[0]['imagen']);
            }
        }
    }

    /**
     * 
     * @param string $campo
     * @param string $tabla
     * @param int $id
     * @param string $carpeta
     */
    public function unlinkImagen($campo, $tabla, $id, $carpeta) {
        $sql = $this->db->select("select $campo from $tabla where id = $id");
        $dir = 'public/images/' . $carpeta . '/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0][$campo])) {
                unlink($dir . $sql[0][$campo]);
            }
        }
    }

    /**
     * 
     * @param string $campo
     * @param string $tabla
     * @param int $id
     * @param string $carpeta
     */
    public function unlinkImagenMultimedia($campo, $tabla, $id, $carpeta) {
        $sql = $this->db->select("select $campo from $tabla where id = $id");
        $dir = 'public/multimedia/' . $carpeta . '/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0][$campo])) {
                unlink($dir . $sql[0][$campo]);
            }
        }
    }

    public function unlinkVideoMultimedia($id) {
        $sql = $this->db->select("select archivo from multimedia_items where id = $id");
        $dir = 'public/multimedia/videos/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['archivo'])) {
                unlink($dir . $sql[0]['archivo']);
            }
        }
    }

    public function datosSeccion1() {
        $sql = $this->db->select("select * from inicio_contenido where id = 1");
        return $sql[0];
    }

    public function frmEditarIndexSeccion1($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('inicio_contenido', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado los textos del inicio.'
        );
        return $data;
    }

    public function frmEditarContenidoQuienesSomos($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'contenido_mision' => utf8_decode($datos['contenido_mision']),
            'contenido_vision' => utf8_decode($datos['contenido_vision']),
            'titulo_vision' => utf8_decode($datos['titulo_vision']),
            'titulo_mision' => utf8_decode($datos['titulo_mision']),
            'fontawesome_vision' => utf8_decode($datos['fontawesome_vision']),
            'fontawesome_mision' => utf8_decode($datos['fontawesome_mision'])
        );
        $this->db->update('quienes_somos', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado los contenidos.'
        );
        return $data;
    }

    public function frmEditarContenidoDirectores($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
        );
        $this->db->update('directores', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado el contenido de Directores.'
        );
        return $data;
    }

    public function frmEditarContenidoClientes($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
        );
        $this->db->update('clientes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado el contenido de Clientes.'
        );
        return $data;
    }

    public function frmEditarContenidoHerramientas($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
        );
        $this->db->update('herramientas', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'message' => 'Se han actualizado el contenido de Herramientas.'
        );
        return $data;
    }

    public function frmEditarContenidoEquipo($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
        );
        $this->db->update('equipo', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado el contenido del Equipo.'
        );
        return $data;
    }

    public function frmEditarContenidoNoticias($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
        );
        $this->db->update('multimedia', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado el contenido de la Noticia.'
        );
        return $data;
    }

    public function frmEditarContenidoValores($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
        );
        $this->db->update('valores', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado el contenido de Valores.'
        );
        return $data;
    }

    public function frmEditarContenidoServicios($datos) {
        $id = 1;
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
        );
        $this->db->update('servicios', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se han actualizado el contenido de Servicios.'
        );
        return $data;
    }

    public function modalAgregarSlider() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Slider</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarSlider" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 1920 x 1200<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarSlider" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarSlider").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Slider</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Slider',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarQuienesSomos() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarQuienesSomos" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 1920 x 1200<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarQuienesSomos" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarQuienesSomos").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Imagen',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarHerramientasImg() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarHerramientasImg" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 1920 x 1200<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarHerramietasImg" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarHerramietasImg").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Imagen',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarServiciosImg() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarServiciosImg" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 1920 x 1200<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarServiciosImg" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarServiciosImg").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Imagen',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarDirectoresImg() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarDirectoresImg" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 1920 x 1200<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarDirectoresImg" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarDirectoresImg").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Imagen',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarDirectores() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Director</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarDirectores" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" name="cargo" class="form-control" placeholder="Cargo" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" placeholder="Linkedin" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 542 x 560<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarDirectores" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarDirectores").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Director',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarEquipo() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Integrante al Equipo</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarEquipo" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" name="cargo" class="form-control" placeholder="Cargo" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 380 x 573px<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarEquipo" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarEquipo").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Integrante al Equipo',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarCliente() {
        $tipos = $this->helper->getEnumOptions('clientes_items', 'tipo');
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Cliente</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarCliente" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control m-b" name="tipo" required> 
                                            <option value="">Seleccione un Rol</option>';
        foreach ($tipos as $item) {
            $modal .= '                     <option value="' . $item . '">' . $item . '</option>';
        }
        $modal .= '                     </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="descripcion" class="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 500 x 400px<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarCliente" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarCliente").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Cliente</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Integrante al Equipo',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarHerramienta() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Herramienta</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarHerramienta" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 150 x 150px<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                        <strong>Importante: Subir las imagenes en las dimensiones indicadas, otras dimensiones a la no indicadas podrían no verse correctamente.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarHerramienta" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarHerramienta").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Imagen</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Herramienta',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarValores() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Valores</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarValores" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" value="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Valores</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar item a Valores',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarServicios() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Servicios</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarServicios" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Tirulo" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Contenido</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar item a Servicios',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarSlider($datos) {
        $this->db->insert('inicio_imagenes', array(
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarQuienesSomos($datos) {
        $this->db->insert('quienes_somos_imagenes', array(
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarHerramientasImg($datos) {
        $this->db->insert('herramientas_imagenes', array(
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarServiciosImg($datos) {
        $this->db->insert('servicios_imagenes', array(
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarDirectoresImg($datos) {
        $this->db->insert('directores_imagenes', array(
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarDirectores($datos) {
        $this->db->insert('directores_personas', array(
            'nombre' => utf8_decode($datos['nombre']),
            'cargo' => utf8_decode($datos['cargo']),
            'email' => utf8_decode($datos['email']),
            'linkedin' => utf8_decode($datos['linkedin']),
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarEquipo($datos) {
        $this->db->insert('equipo_integrantes', array(
            'nombre' => utf8_decode($datos['nombre']),
            'cargo' => utf8_decode($datos['cargo']),
            'email' => utf8_decode($datos['email']),
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarCliente($datos) {
        $this->db->insert('clientes_items', array(
            'nombre' => utf8_decode($datos['nombre']),
            'tipo' => utf8_decode($datos['tipo']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarNoticia($datos) {
        $fecha = $datos['fecha'];
        $fecha = str_replace('/', '-', $fecha);
        $this->db->insert('multimedia_items', array(
            'titulo' => utf8_decode($datos['titulo']),
            'youtube' => utf8_decode($datos['youtube']),
            'vimeo' => utf8_decode($datos['vimeo']),
            'fecha' => date('Y-m-d', strtotime($fecha)),
            'contenido' => $datos['contenido'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarHerramienta($datos) {
        $this->db->insert('herramientas_items', array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAddSliderImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('inicio_imagenes', $update, "id = $id");
    }

    public function frmAddQuienesSomosImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('quienes_somos_imagenes', $update, "id = $id");
    }

    public function frmAddHerramientasImgImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('herramientas_imagenes', $update, "id = $id");
    }

    public function frmAddServiciosImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('servicios_imagenes', $update, "id = $id");
    }

    public function frmAddDirectoresImgImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('directores_imagenes', $update, "id = $id");
    }

    public function frmAddDirectoresImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('directores_personas', $update, "id = $id");
    }

    public function frmAddEquipoImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('equipo_integrantes', $update, "id = $id");
    }

    public function frmAddClienteImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('clientes_items', $update, "id = $id");
    }

    public function frmAddMultimediaImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('multimedia_items', $update, "id = $id");
    }

    public function frmAddMultimediaVideo($video) {
        $id = $video['id'];
        $update = array(
            'archivo' => $video['archivo']
        );
        $this->db->update('multimedia_items', $update, "id = $id");
    }

    public function frmAddHerramientaImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('herramientas_items', $update, "id = $id");
    }

    public function datosContenido($tabla) {
        $sql = $this->db->select("select * from $tabla where id = 1");
        return $sql[0];
    }

    public function frmAgregarValores($datos) {
        $this->db->insert('valores_items', array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => (!empty($datos['estado'])) ? $datos['estado'] : 0
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from valores_items where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="valores" data-rowid="valores_" data-tabla="valores_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="valores" data-rowid="valores_" data-tabla="valores_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTValores"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'content' => '<tr id="seccion2_' . $id . '" role="row" class="odd">'
            . '<td class="sorting_1">' . $sql[0]['orden'] . '</td>'
            . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
            . '<td>' . $estado . '</td>'
            . '<td>' . $btnEditar . '</td>'
            . '</tr>',
            'mensaje' => 'Se ha agregado correctamente Item a Valores'
        );
        return $data;
    }

    public function frmAgregarServicios($datos) {
        $this->db->insert('servicios_items', array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => (!empty($datos['estado'])) ? $datos['estado'] : 0
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from servicios_items where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="servicios_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="servicios_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTServicios"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'content' => '<tr id="servicios_' . $id . '" role="row" class="odd">'
            . '<td class="sorting_1">' . $sql[0]['orden'] . '</td>'
            . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
            . '<td>' . $estado . '</td>'
            . '<td>' . $btnEditar . '</td>'
            . '</tr>',
            'mensaje' => 'Se ha agregado correctamente el item a Servicios'
        );
        return $data;
    }

    public function getMenu() {
        $sql = $this->db->select("select * from menu order by orden asc");
        return $sql;
    }

    public function modalEditarRedes($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM redes where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarRedes" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Red Social</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Nombre Red Social" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enlace</label>
                                    <input type="text" name="url" class="form-control" placeholder="Enlace" value="' . utf8_encode($sql[0]['url']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Para cambiar el icono hay que visitar la siguiente pagina y copiar el tag del icono. <a class="alert-link" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a>.
                                </div>
                                    <div class="form-group">
                                    <label>Font Awesome</label>
                                    <input type="text" name="fontawesome" class="form-control" placeholder="Fuente" value="' . utf8_encode($sql[0]['fontawesome']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Red Social</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Red Social',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarMenu($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM menu where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarMenu" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Menú</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green"
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Menú',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarMenu($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('menu', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('menu', 'menu', $id),
            'mensaje' => 'Se ha editado satisfactoriamente los datos del menú ',
            'id' => $id
        );
        return $data;
    }

    public function listadoDTUsuarios() {
        $sql = $this->db->select("SELECT
                                        wa.id,
                                        wa.nombre,
                                        wa.email,
                                        wr.descripcion AS rol,
                                        wa.estado
                                FROM
                                        usuario wa
                                LEFT JOIN rol wr ON wr.id = wa.id_rol");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUsuario"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "usuarios_$id",
                'nombre' => utf8_encode($item['nombre']),
                'email' => utf8_encode($item['email']),
                'rol' => utf8_encode($item['rol']),
                'estado' => $estado,
                'accion' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarDTUsuario($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT
                                        wa.id,
                                        wa.nombre,
                                        wa.email,
                                        wa.id_rol,
                                        wr.descripcion AS rol,
                                        wa.estado
                                FROM
                                        usuario wa
                                LEFT JOIN rol wr ON wr.id = wa.id_rol where wa.id = $id");
        $sqlRoles = $this->db->select("select * from rol where estado = 1");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarUsuario" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['nombre']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="' . utf8_encode($sql[0]['email']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control m-b" name="id_usuario_rol" required> 
                                        <option value="">Seleccione un Rol</option>';
        foreach ($sqlRoles as $item) {
            $selected = ($item['id'] == $sql[0]['id_rol']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['id'] . '" ' . $selected . '>' . $item['descripcion'] . '</option>';
        }
        $modal .= '                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Solamente complete el campo contraseña cuando desee modificar la misma. Si la deja vacia no se modificará.
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" value="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Datos del Usuario',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarUsuario($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $contrasena = $datos['contrasena'];
        if (!empty($contrasena)) {
            $update = array(
                'nombre' => utf8_decode($datos['nombre']),
                'email' => utf8_decode($datos['email']),
                'id_rol' => utf8_decode($datos['id_rol']),
                'contrasena' => Hash::create('sha256', $contrasena, HASH_PASSWORD_KEY),
                'estado' => $estado
            );
        } else {
            $update = array(
                'nombre' => utf8_decode($datos['nombre']),
                'email' => utf8_decode($datos['email']),
                'id_rol' => utf8_decode($datos['id_rol']),
                'estado' => $estado
            );
        }
        $this->db->update('usuario', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('usuarios', 'usuario', $id),
            'message' => 'Se han Actualizado correctamente los datos del usuario ' . $datos['nombre'],
            'id' => $id
        );
        return $data;
    }

    public function modalAgregarUsuario() {
        $sqlRoles = $this->db->select("select * from rol where estado = 1");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarUsuario" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control m-b" name="id_usuario_rol" required> 
                                        <option value="">Seleccione un Rol</option>';
        foreach ($sqlRoles as $item) {
            $modal .= '                 <option value="' . $item['id'] . '">' . $item['descripcion'] . '</option>';
        }
        $modal .= '                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" value="" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Usuario',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarUsuario($datos) {
        $this->db->insert('usuario', array(
            'id_rol' => utf8_decode($datos['id_rol']),
            'email' => utf8_decode($datos['email']),
            'contrasena' => Hash::create('sha256', utf8_decode($datos['contrasena']), HASH_PASSWORD_KEY),
            'nombre' => utf8_decode($datos['nombre']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function getRedesTable() {
        $sql = $this->db->select("select * from redes");
        return $sql;
    }

    public function frmEditarRedes($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'url' => utf8_decode($datos['url']),
            'fontawesome' => utf8_decode($datos['fontawesome']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('redes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('redes', 'redes', $id),
            'mensaje' => 'Se han editado satisfactoriamente los datos de ' . $datos['descripcion'],
            'id' => $id
        );
        return $data;
    }

    public function modalAgregarRedes() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarRedes" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Red Social</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Nombre Red Social" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enlace</label>
                                    <input type="text" name="url" class="form-control" placeholder="Enlace" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Para cambiar el icono hay que visitar la siguiente pagina y copiar el tag del icono. <a class="alert-link" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a>.
                                </div>
                                    <div class="form-group">
                                    <label>Font Awesome</label>
                                    <input type="text" name="fontawesome" class="form-control" placeholder="Fuente" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Red Social</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Red Social',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarRedes($datos) {
        $this->db->insert('redes', array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'url' => utf8_decode($datos['url']),
            'fontawesome' => utf8_decode($datos['fontawesome']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => (!empty($datos['estado'])) ? $datos['estado'] : 0
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from redes where id = $id");
        $btnEstado = '';
        if ($sql[0]['estado'] == 1) {
            $btnEstado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $btnEstado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $data = array(
            'type' => 'success',
            'content' => '<tr id="redes_' . $id . '">'
            . '<td>' . $sql[0]['orden'] . '</td>'
            . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
            . '<td>' . $sql[0]['url'] . '</td>'
            . '<td>' . $btnEstado . '</td>'
            . '<td> <a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarRedes"><i class="fa fa-edit"></i> Editar </a> </td></tr>',
            'mensaje' => 'Se ha agregado correctamente la red social ' . utf8_encode($sql[0]['descripcion']),
            'id' => $id
        );
        return $data;
    }

    public function frmEditarDatosContacto($datos) {
        $update = array(
            'telefono' => utf8_decode($datos['telefono']),
            'direccion' => utf8_decode($datos['direccion']),
            'ciudad' => utf8_decode($datos['ciudad']),
            'email' => utf8_decode($datos['email']),
            'web' => utf8_decode($datos['web']),
            'titulo_contacto' => utf8_decode($datos['titulo_contacto']),
            'subtitulo_contacto' => utf8_decode($datos['subtitulo_contacto']),
        );
        $this->db->update('datos_contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de datos de Contacto'
        );
        return $data;
    }

    public function frmEditarDatosMapa($datos) {
        $update = array(
            'longitud' => utf8_decode($datos['longitud']),
            'latitud' => utf8_decode($datos['latitud']),
            'zoom' => utf8_decode($datos['zoom']),
            'texto_marcador' => utf8_decode($datos['texto_marcador'])
        );
        $this->db->update('datos_contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado los datos del mapa'
        );
        return $data;
    }

    public function listadoDTContacto($datos) {
        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'email',
            3 => 'fecha',
            4 => 'visto',
            5 => 'accion'
        );
#getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM frm_contacto");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM frm_contacto where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (nombre LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR fecha LIKE '%" . $requestData['search']['value'] . "%' )";
#when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM frm_contacto where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['leido'] == 1) {
                $estado = '<span class="label label-primary">Leído</span>';
            } else {
                $estado = '<span class="label label-danger">No Leído</span>';
            }
            $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'contacto_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["nombre"]);
            $nestedData[] = utf8_encode($row["email"]);
            $nestedData[] = date('d-m-Y H:i:s', strtotime($row["fecha"]));
            $nestedData[] = $estado;
            $nestedData[] = $btnEditar;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($datos['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        return json_encode($json_data);
    }

    public function modalVerContacto($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM frm_contacto where id = $id");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulario de contacto enviado por ' . utf8_encode($sql[0]['nombre']) . '</h3>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tr>
                                <td class="text-bold">Nombre:</td>
                                <td>' . utf8_encode($sql[0]['nombre']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Email:</td>
                                <td>' . utf8_encode($sql[0]['email']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Mensaje:</td>
                                <td>' . utf8_encode($sql[0]['mensaje']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">IP:</td>
                                <td>' . utf8_encode($sql[0]['ip']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Fecha:</td>
                                <td>' . date('d-m-Y H:i:s', strtotime($sql[0]['fecha'])) . '</td>
                            </tr>
                        </table>
                    </div>
                </div>';
        $update = array(
            'leido' => 1
        );
        $this->db->update('frm_contacto', $update, "id = $id");
        $data = array(
            'titulo' => 'Ver datos de contacto',
            'content' => $modal,
            'id' => $id,
            'row' => $this->rowDataTable('verContacto', 'frm_contacto', $id)
        );
        return json_encode($data);
    }

    public function uploadImgLogo($datos) {
        $id = 1;
        $update = array(
            'logo' => $datos['imagen']
        );
        $this->db->update('logos', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgLogoBN($datos) {
        $id = 1;
        $update = array(
            'logo_white' => $datos['imagen']
        );
        $this->db->update('logos', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function unlinkLogoCabecera() {
        $sql = $this->db->select("SELECT logo FROM `logos` WHERE id = 1;");
        $dir = 'public/images/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['logo'])) {
                unlink($dir . $sql[0]['logo']);
            }
        }
    }

    public function unlinkLogo() {
        $sql = $this->db->select("SELECT logo_white FROM `logos` WHERE id = 1;");
        $dir = 'public/images/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['logo_white'])) {
                unlink($dir . $sql[0]['logo_white']);
            }
        }
    }

    public function rptVisitasPaginas($datos) {
        require './util/Analytics.php';
        $this->analytics = new Analytics();
        $googleData = $this->analytics->getPageViews($this->analytics->analytics, $this->analytics->profile, $datos['fechaInicio'], $datos['fechaFin'], $datos['mostrar']);
        $data = '
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Página</th>
                            <th>Número de Visitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        ';
        foreach ($googleData as $item) {
            $data .= '  <tr>
                            <td>' . $item[0] . '</td>
                            <td class="text-center">' . number_format($item[1], 0, ',', '.') . '</td>
                        </tr>';
        }
        $data .= '      
                    </tbody>
                </table>';
        return $data;
    }

    public function rptCantidadVisitasDia($datos) {
        require './util/Analytics.php';
        $this->analytics = new Analytics();
        $googleData = $this->analytics->getCantidadVisitasDia($this->analytics->analytics, $this->analytics->profile, $datos['fechaInicio'], $datos['fechaFin']);
        $data = '<div id="morris-one-line-chart"></div>
                <script type="">
                    $(function() {
                        var months = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
                        Morris.Line({
                            element: "morris-one-line-chart",
                                data: [';
        foreach ($googleData as $item) {
            $data .= '                  { day: "' . date('Y-m-d H:i:s', strtotime($item[0])) . '", value: ' . $item[1] . ' },';
        }
        $data .= '                  ],
                            xkey: "day",
                            xlabels: "day",
                            xLabelFormat: function (x) {
                                var d = new Date(x.label.slice(0, 10) + "T" + x.label.slice(11, x.label.length));
                                return d.getDate() + \' \' + months[d.getMonth()];
                            },
                            ykeys: ["value"],
                            labels: ["Cantidad"],
                            pointSize: 2,
                            hideHover: "auto",
                            lineColors: ["rgb(0, 188, 212)"],
                            xLabelAngle: 50,
                            behaveLikeLine: true,
                            parseTime: false
                        });
                    });
                </script>';
        return $data;
    }

    public function rptUsuarios($datos) {
        require './util/Analytics.php';
        $this->analytics = new Analytics();
        $googleData = $this->analytics->getUsuarios($this->analytics->analytics, $this->analytics->profile, $datos['fechaInicio'], $datos['fechaFin']);
        $data = array(
            'usuarios' => '<h3>' . number_format($googleData[0][0], 0, ',', '.') . '</h3>',
            'usuariosNuevos' => '<h3>' . number_format($googleData[0][1], 0, ',', '.') . '</h3>',
            'sesiones' => '<h3>' . number_format($googleData[0][2], 0, ',', '.') . '</h3>',
        );
        return $data;
    }

    public function rptDispositivos($datos) {
        require './util/Analytics.php';
        $this->analytics = new Analytics();
        $googleData = $this->analytics->getDispositivos($this->analytics->analytics, $this->analytics->profile, $datos['fechaInicio'], $datos['fechaFin']);
        $data = '<div class="row">
                    <div class="col-xs-4"><h3><i class="fa fa-desktop" aria-hidden="true"></i> ' . number_format($googleData[0][1], 0, ',', '.') . '</h3></div>
                    <div class="col-xs-4"><h3><i class="fa fa-mobile" aria-hidden="true"></i> ' . number_format($googleData[1][1], 0, ',', '.') . '</h3></div>
                    <div class="col-xs-4"><h3><i class="fa fa-tablet" aria-hidden="true"></i> ' . number_format($googleData[2][1], 0, ',', '.') . '</h3></div>
                </div>';
        return $data;
    }

    public function rptPaginasSesion($datos) {
        require './util/Analytics.php';
        $this->analytics = new Analytics();
        $googleData = $this->analytics->getPaginasSesion($this->analytics->analytics, $this->analytics->profile, $datos['fechaInicio'], $datos['fechaFin']);
        $data = '<div class="row">
                    <h3>' . number_format($googleData[0][0], 2, ',', '.') . '</h3>
                </div>';
        return $data;
    }

}
