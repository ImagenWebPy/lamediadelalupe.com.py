<?php

/**
 * ARCHIVO INDEX
 * @author "Raul Ramirez" <raul.chuky@gmail.com>
 * @version 1 2018-08-20
 */
#mostramos los errores
#Siempre mostrar todos los errores para que el sistema funcione con "0" errores y/o warnings
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("America/Asuncion");

require 'config.php';
require 'util/Auth.php';

require 'util/Helper.php';

//cargarmos las librerias complementarias
// Also spl_autoload_register (Take a look at it if you like)
function __autoload($class) {
    require LIBS . $class . ".php";
}

#esta libreria cargamos despues de los libs para que agarre las conexiones de la DB
#sin necesidad de volver a instanciarlas


Session::init();

#Cargamos el inicializador
$bootstrap = new Bootstrap();

$bootstrap->init();

ob_end_flush();
