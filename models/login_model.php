<?php

class Login_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function iniciar($data) {
        $datos = array();
        #capturamos los datos recibidos por post
        $email = $data['email'];
        $pass = trim(Hash::create('sha256', $data['contrasena'], HASH_PASSWORD_KEY));
        #verificamos primero si el usuario existe para poder proseguir con la validacion
        $sthUsuario = $this->db->prepare("select email, estado 
                                                from usuario
                                                where email = :email ");
        $sthUsuario->execute(array(
            ':email' => $email
        ));
        $dataUsuario = $sthUsuario->fetch();
        $countUsuario = $sthUsuario->rowCount();
        if ($countUsuario > 0) {
            #verificamos si el usuario esta habilitado
            if ($dataUsuario['estado'] == 1) {
                #verificamos si la contraseña ingresada es la correcta.
                $sthLogin = $this->db->prepare("select au.id,
                                                    au.nombre,
                                                    au.email,
                                                    au.img,
                                                    ar.id as id_rol,
                                                    ar.descripcion as rol
                                                FROM
                                                usuario au
                                                LEFT JOIN rol ar on ar.id = au.id_rol
                                                where au.email = :email
                                                and au.contrasena = :contrasena");
                $sthLogin->execute(array(
                    ':email' => $email,
                    ':contrasena' => $pass
                ));
                $dataLogin = $sthLogin->fetch();
                $countLogin = $sthLogin->rowCount();
                if ($countLogin > 0) {
                    Session::set('loggedInLaMedia', TRUE);
                    Session::set('usuarioLogueado', array(
                        'id' => $dataLogin['id'],
                        'email' => utf8_encode($dataLogin['email']),
                        'nombre' => utf8_encode($dataLogin['nombre']),
                        'img' => utf8_encode($dataLogin['img']),
                        'rol' => utf8_encode($dataLogin['rol']),
                        'id_rol' => $dataLogin['id_rol']
                    ));
                    $datos = array(
                        'type' => 'success',
                        'content' => URL . 'admin/index'
                    );
                } else {
                    #retornamos mensaje de error: contraseña incorrecta
                    $datos = array(
                        'type' => 'error',
                        'label' => 'lblContrasena',
                        'content' => 'La Contraseña ingresada es incorrecta.'
                    );
                }
            } else {
                #retornamos mensaje de error: Usuario no esta habilitado
                $datos = array(
                    'type' => 'error',
                    'label' => 'lblUsuario',
                    'content' => 'El usuario ingresado se encuentra deshabilitado.'
                );
            }
        } else {
            #retornamos mensaje de error: usuario no existe
            $datos = array(
                'type' => 'error',
                'label' => 'lblUsuario',
                'content' => 'El usuario ingresado no existe.'
            );
        }
        return $datos;
    }

}
