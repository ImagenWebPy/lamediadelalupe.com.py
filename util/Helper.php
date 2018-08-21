<?php

require 'libs/Database.php';

class Helper {

    private $db = '';

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    /**
     * Funcion para limpiar un string
     * @param strig $String a quitar caracteres especiales y espacios
     * @return string formateado
     */
    public function cleanUrl($String) {
        $String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $String);
        $String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $String);
        $String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $String);
        $String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
        $String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
        $String = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $String);
        $String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
        $String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $String);
        $String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
        $String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $String);
        $String = str_replace(array('?', '[', '^', '´', '`', '¨', '~', ']', '¿', '!', '¡'), "", $String);
        $String = str_replace("ç", "c", $String);
        $String = str_replace("Ç", "C", $String);
        $String = str_replace("ñ", "n", $String);
        $String = str_replace("Ñ", "N", $String);
        $String = str_replace("Ý", "Y", $String);
        $String = str_replace("ý", "y", $String);

        $String = str_replace("'", "", $String);
        //$String = str_replace(".", "_", $String);
        $String = str_replace("#", "_", $String);
        $String = str_replace(" ", "_", $String);
        $String = str_replace("/", "_", $String);

        $String = str_replace("&aacute;", "a", $String);
        $String = str_replace("&Aacute;", "A", $String);
        $String = str_replace("&eacute;", "e", $String);
        $String = str_replace("&Eacute;", "E", $String);
        $String = str_replace("&iacute;", "i", $String);
        $String = str_replace("&Iacute;", "I", $String);
        $String = str_replace("&oacute;", "o", $String);
        $String = str_replace("&Oacute;", "O", $String);
        $String = str_replace("&uacute;", "u", $String);
        $String = str_replace("&Uacute;", "U", $String);
        return $String;
    }

    /**
     * Funcion para limpiar un input antes de enviarlo por post
     * @param type $data
     * @return type
     */
    public function cleanInput($data) {
        $data = trim($data);
        $data = str_replace("'", "\'", $data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }

    /**
     * Funcion para mostrar mensajes de alerta
     * @param string $type (success - info - warning - error)
     * @param string $message (mensaje a mostrar)
     * @return string
     */
    public function messageAlert($type, $message) {
        $alert = "";
        switch ($type) {
            case 'success':
                $alert .= '<div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
            case 'info':
                $alert .= '<div class="alert alert-info" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
            case 'warning':
                $alert .= '<div class="alert alert-warning" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
            case 'error':
                $alert .= '<div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
        }
        return $alert;
    }

    /**
     * 
     * @return string url anterior del sitio
     */
    public function getUrlAnterior() {
        $url = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';
        return $url;
    }

    /**
     * Funcion que retorna la url actual en forma de array
     * @return array url
     */
    public function getUrl() {
        $url = '';
        if (!empty($_GET['url'])) {
            $url = $_GET['url'];
            $url = explode('/', $url);
        }
        return $url;
    }

    /**
     * Funcion que lista las opciones del campo enum de una tabla
     * @param string $table
     * @param string $field
     * @return array con las opciones del campo enum
     */
    public function getEnumOptions($table, $field) {
        $finalResult = array();
        if (strlen(trim($table)) < 1)
            return false;
        $query = $this->db->select("show columns from $table");
        foreach ($query as $row) {
            if ($field != $row["Field"])
                continue;
//check if enum type 
            if (preg_match('/enum.(.*)./', $row['Type'], $match)) {
                $opts = explode(',', $match[1]);
                foreach ($opts as $item)
                    $finalResult[] = substr($item, 1, strlen($item) - 2);
            } else
                return false;
        }
        return $finalResult;
    }

    /**
     * Funcion para obtener las paginas donde nos encontramos
     * @return array
     */
    public function getPage() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $pagina = (explode('/', $url));
        return $pagina;
    }

    /**
     * Devuelve la ip del visitante
     * @return string IP
     */
    public function getReal_ip() {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    /**
     * 
     * @param int $per_page
     * @param int $page
     * @param string $table (tabla a obtener el maximo de registros)
     * @param string $section (ruta del mvc a paginar)
     * @return string
     */
    public function mostrarPaginador($per_page, $page, $table, $controlador, $section, $condicion = NULL, $inPage = FALSE, $getParameters = NULL) {
        $parametros = (!empty($getParameters)) ? implode(',', $getParameters) : '';
        $metodo = $section;
        if ($inPage == TRUE) {
            $metodo = $section;
        }
        if (!empty($condicion)) {
            $query = $this->db->select("SELECT COUNT(*) as totalCount $condicion");
        } else {
            $query = $this->db->select("SELECT COUNT(*) as totalCount FROM $table where estado = 1");
        }
        $total = $query[0]['totalCount'];
        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total / $per_page);
        $lpm1 = $setLastpage - 1;

        $paging = "";
        #si la ultima pagina es mayor a 1
        if ($setLastpage > 1) {
            $paging .= "<ul class='pagination'>";
            $paging .= "<li class='active'>Página $page de $setLastpage</li>";
            if ($setLastpage < 5 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $setLastpage; $counter++) {
                    if ($counter == $page)
                        $paging .= "<li class='active'><a href='#'>$counter</a></li>";
                    else
                        $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, $counter, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                }
            }
            elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $paging .= '<li class="active"><a href="#">' . $counter . '</a></li>';
                        else
                            $paging .= '<li><a  ' . $this->urlPaginador($controlador, $metodo, $counter, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                    }
                    $paging .= "<li class='dot'>...</li>";
                    $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, $lpm1, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $lpm1 . '</a></li>';
                    $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, $setLastpage, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $setLastpage . '</a></li>';
                }
                elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, 1, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>1</a></li>';
                    $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, 2, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>2</a></li>';
                    $paging .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $paging .= "<li class='active'><a href='#'>$counter</a></li>";
                        else
                            $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, $counter, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                    }
                    $paging .= "<li class='dot'>..</li>";
                    $paging .= '<li><a  ' . $this->urlPaginador($controlador, $metodo, $lpm1, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $lpm1 . '</a></li>';
                    $paging .= '<li><a  ' . $this->urlPaginador($controlador, $metodo, $setLastpage, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $setLastpage . '</a></li>';
                }
                else {
                    $paging .= '<li><a  ' . $this->urlPaginador($controlador, $metodo, 1, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>1</a></li>';
                    $paging .= '<li><a  ' . $this->urlPaginador($controlador, $metodo, 2, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>2</a></li>';
                    $paging .= "<li class = 'dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $paging .= "<li class='active'><a href='#'>$counter</a></li>";
                        else
                            $paging .= '<li><a  ' . $this->urlPaginador($controlador, $metodo, $counter, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                    }
                }
            }

            if ($page < $counter - 1) {
                $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, $next, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border >Siguiente</a></li>';
                $paging .= '<li><a ' . $this->urlPaginador($controlador, $metodo, $setLastpage, $inPage, $parametros) . ' data-size="small" data-color="secondary" data-border>Ultima</a></li>';
            } else {
                $paging .= "<li class='active'><a href='#'>Siguiente</a></li>";
                $paging .= "<li class='active'><a href='#'>Ultima</a></li>";
            }

            $paging .= "</ul>";
        }
        return $paging;
    }

    private function urlPaginador($controlador, $section, $counter, $inPage, $parametros = NULL) {
        if ($inPage == FALSE) {
            $enlace = 'href="' . URL . $controlador . '/' . $section . '/' . $counter . '/' . $parametros . '"';
        } else {
            $url = explode('/', $section);
            $funcion = $url[0];
            $enlace = 'onclick="' . $funcion . '(\'' . URL . $controlador . '/' . $section . '/' . $counter . '/' . $parametros . '\')"';
        }
        return $enlace;
    }

    function redimensionar($file, $nameFile, $ancho, $alto, $serverdir) {
        # se obtene la dimension y tipo de imagen 
        $datos = getimagesize($file);

        $ancho_orig = $datos[0]; # Anchura de la imagen original 
        $alto_orig = $datos[1];    # Altura de la imagen original 
        $tipo = $datos[2];

        if ($tipo == 1) { # GIF 
            if (function_exists("imagecreatefromgif"))
                $img = imagecreatefromgif($file);
            else
                return false;
        }
        else if ($tipo == 2) { # JPG 
            if (function_exists("imagecreatefromjpeg"))
                $img = imagecreatefromjpeg($file);
            else
                return false;
        }
        else if ($tipo == 3) { # PNG 
            if (function_exists("imagecreatefrompng"))
                $img = imagecreatefrompng($file);
            else
                return false;
        }

        # Se calculan las nuevas dimensiones de la imagen 
        if ($ancho_orig > $alto_orig) {
            $ancho_dest = $ancho;
            $alto_dest = ($ancho_dest / $ancho_orig) * $alto_orig;
        } else {
            $alto_dest = $alto;
            $ancho_dest = ($alto_dest / $alto_orig) * $ancho_orig;
        }

        // imagecreatetruecolor, solo estan en G.D. 2.0.1 con PHP 4.0.6+ 
        $img2 = @imagecreatetruecolor($ancho_dest, $alto_dest) or $img2 = imagecreate($ancho_dest, $alto_dest);

        // Redimensionar 
        // imagecopyresampled, solo estan en G.D. 2.0.1 con PHP 4.0.6+ 
        @imagecopyresampled($img2, $img, 0, 0, 0, 0, $ancho_dest, $alto_dest, $ancho_orig, $alto_orig) or imagecopyresized($img2, $img, 0, 0, 0, 0, $ancho_dest, $alto_dest, $ancho_orig, $alto_orig);

        // Crear fichero nuevo, según extensión. 
        if ($tipo == 1) // GIF 
            if (function_exists("imagegif"))
                imagegif($img2, $serverdir . $nameFile, 60);
            else
                return false;

        if ($tipo == 2) // JPG 
            if (function_exists("imagejpeg"))
                imagejpeg($img2, $serverdir . $nameFile, 60);
            else
                return false;

        if ($tipo == 3)  // PNG 
            if (function_exists("imagepng"))
                imagepng($img2, $serverdir . $nameFile, 6);
            else
                return false;

        return true;
    }

    /**
     * Funcion que envia un correo a travez de la funcion mail de PHP.
     * @param string $para
     * @param string $asunto
     * @param string $mensaje
     * @param string $cc
     */
    public function sendMail($para, $asunto, $mensaje, $cc = NULL) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: CADIEM Fondos <atc@cadiemfondos.com.py>' . "\r\n";
        if (!empty($cc))
            $headers .= 'Bcc:' . $emailAsesor . "\r\n";
        $headers .= 'Reply-To: atc@cadiemfondos.com.py' . "\r\n";
        mail($para, $asunto, $mensaje, $headers);
    }

    /**
     * Ver http://php.net/manual/es/function.date.php para mas información sobre los formatos de fecha.
     * @param string $format
     * @param type $month (Nombre abreviado o completo del mes en ingles de acuerdo al formato elegido)
     * @return string
     */
    public function TranslateDate($format, $month, $language = 'es') {
        $mes = '';
        switch ($format) {
            case 'F':
                switch ($month) {
                    case 'January':
                        $mes = 'Enero';
                        break;
                    case 'February':
                        $mes = 'Febrero';
                        break;
                    case 'March':
                        $mes = 'Marzo';
                        break;
                    case 'April':
                        $mes = 'Abril';
                        break;
                    case 'May':
                        $mes = 'Mayo';
                        break;
                    case 'June':
                        $mes = 'Junio';
                        break;
                    case 'July':
                        $mes = 'Julio';
                        break;
                    case 'August':
                        $mes = 'Agosto';
                        break;
                    case 'September':
                        $mes = 'Septiembre';
                        break;
                    case 'October':
                        $mes = 'Octubre';
                        break;
                    case 'November':
                        $mes = 'Noviembre';
                        break;
                    case 'December':
                        $mes = 'Diciembre';
                        break;
                }
                break;
            case 'M':
                switch ($language) {
                    case 'es':
                        switch ($month) {
                            case 'Jan':
                                $mes = 'Ene';
                                break;
                            case 'Feb':
                                $mes = 'Feb';
                                break;
                            case 'Mar':
                                $mes = 'Mar';
                                break;
                            case 'Apr':
                                $mes = 'Abr';
                                break;
                            case 'May':
                                $mes = 'May';
                                break;
                            case 'Jun':
                                $mes = 'Jun';
                                break;
                            case 'Jul':
                                $mes = 'Jul';
                                break;
                            case 'Aug':
                                $mes = 'Ago';
                                break;
                            case 'Sept':
                                $mes = 'Set';
                                break;
                            case 'Sep':
                                $mes = 'Set';
                                break;
                            case 'Oct':
                                $mes = 'Oct';
                                break;
                            case 'Nov':
                                $mes = 'Nov';
                                break;
                            case 'Dec':
                                $mes = 'Dic';
                                break;
                        }
                        break;
                    case 'en':
                        switch ($month) {
                            case 'Ene':
                                $mes = 'Jan';
                                break;
                            case 'Feb':
                                $mes = 'Feb';
                                break;
                            case 'Mar':
                                $mes = 'Mar';
                                break;
                            case 'Abr':
                                $mes = 'Apr';
                                break;
                            case 'May':
                                $mes = 'May';
                                break;
                            case 'Jun':
                                $mes = 'Jun';
                                break;
                            case 'Jul':
                                $mes = 'Jul';
                                break;
                            case 'Ago':
                                $mes = 'Aug';
                                break;
                            case 'Set':
                                $mes = 'Sept';
                                break;
                            case 'Set':
                                $mes = 'Sep';
                                break;
                            case 'Oct':
                                $mes = 'Oct';
                                break;
                            case 'Nov':
                                $mes = 'Nov';
                                break;
                            case 'Dic':
                                $mes = 'Dec';
                                break;
                        }
                        break;
                }
                break;
        }
        return $mes;
    }

    /**
     * Funcion que retorna un string aleatorio
     * @param string $type ('numerico','alfanumerico','especial')
     * @param int $length
     * @return string
     */
    public function generateRandomString($type, $length = 10) {
        switch ($type) {
            case 'numerico':
                $characters = '0123456789';
                break;
            case 'alfanumerico':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'especial':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-{}[],.;¿?!¡';
                break;
        }

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Encrypt and decrypt
     * 
     * @author Nazmul Ahsan <n.mukto@gmail.com>
     * @link http://nazmulahsan.me/simple-two-way-function-encrypt-decrypt-string/
     *
     * @param string $string string to be encrypted/decrypted
     * @param string $action what to do with this? e for encrypt, d for decrypt
     * @return string
     */
    function encrypt($string, $action = 'e') {
        $secret_key = '!@123456789ABCDEFGHIJKLMNOPRSTWYZ[¿]{?}<->';
        $secret_iv = '12345678910AABBCCDDEEFFGG';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if (!empty($string)) {
            if ($action == 'e') {
                $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
            } else if ($action == 'd') {
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
        } else {
            $output = '';
        }
        return $output;
    }

    /*     * ***************************
     * FUNCIONES DEL INHERENTES AL SISTEMA
     * ****************************** */

    /**
     * Funcion que retorna los enlaces a redes sociales,
     * parametro opcional cantidad de resultados ($limit)
     * @param int $limit
     * @return array
     */
    public function obtenerRedes($limit = NULL) {
        $limite = (!empty($limit)) ? "LIMIT $limit" : '';
        $sql = $this->db->select("SELECT
                                        descripcion,
                                        url,
                                        fontawesome
                                FROM
                                        redes
                                WHERE
                                        estado = 1
                                ORDER BY
                                        orden ASC
                                $limite");
        return $sql;
    }

    /**
     * Funcion que retorna el contenido del slider
     * @return array
     */
    public function obtenerSlider() {
        $sql = $this->db->select("SELECT
                                        imagen,
                                        titulo,
                                        texto_complementario
                                FROM
                                        slider
                                WHERE
                                        estado = 1
                                ORDER BY
                                        orden ASC");
        return $sql;
    }

    /**
     * Funcion que retorna el contenido de la seccion 1 de la pagina de inicio
     * @return array
     */
    public function index_seccion_1() {
        $sql = $this->db->select("SELECT
                                        titulo,
                                        contenido
                                FROM
                                        index_seccion_1
                                WHERE
                                        estado = 1
                                AND id = 1;");
        return $sql[0];
    }

    public function index_seccion_2() {
        $sql = $this->db->select("SELECT
                                        titulo,
                                        contenido,
                                        fontawesome
                                FROM
                                        index_seccion_2
                                WHERE
                                        estado = 1
                                ORDER BY
                                        orden ASC");
        return $sql;
    }

    /**
     * Funcion que retorna el contenido de la seccion 3 de la pagina de inicio
     * @return array
     */
    public function index_seccion_3() {
        $sql = $this->db->select("SELECT
                                        titulo,
                                        subtitulo,
                                        descripcion,
                                        imagen,
                                        titulo_cuadro,
                                        descripcion_cuadro
                                FROM
                                        index_seccion_3
                                WHERE
                                        id = 1
                                AND estado = 1");
        return $sql[0];
    }

    /**
     * Funcion que retorna el contenido de la seccion 4 de la pagina de inicio
     * @return array
     */
    public function index_seccion_4() {
        $sql = $this->db->select("SELECT
                                        titulo,
                                        subtitulo,
                                        descripcion,
                                        imagen
                                FROM
                                        index_seccion_4
                                WHERE
                                        id = 1
                                AND estado = 1");
        return $sql[0];
    }

    /**
     * Funcion que retorna el contenido de la seccion 5 de la pagina de inicio
     * @return array
     */
    public function index_seccion_5() {
        $sql = $this->db->select("SELECT
                                        titulo,
                                        subtitulo
                                FROM
                                        index_seccion_5
                                WHERE
                                        id = 1
                                AND estado = 1");
        return $sql[0];
    }

    /**
     * Funcion que retorna los colaboradores de la empresa por orden ascendente
     * @return array
     */
    public function mostrar_equipo_trabajo() {
        $sql = $this->db->select("SELECT
                                        id,
                                        nombre,
                                        cargo,
                                        email,
                                        telefono,
                                        imagen,
                                        mostrar_email,
                                        mostrar_telefono
                                FROM
                                        equipo
                                WHERE
                                        estado = 1
                                ORDER BY
                                        orden ASC");
        return $sql;
    }

    public static function obtenerRedesEquipo($id_equipo) {
        require_once 'util/Helper.php';
        $db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $sql = $db->select("SELECT
                                        red_social,
                                        url,
                                        fontawesome
                                FROM
                                        equipo_redsocial
                                WHERE
                                        id_equipo = $id_equipo
                                AND estado = 1
                                ORDER BY
                                        orden ASC");
        return $sql;
    }

    public function getErrorContenido() {
        $sql = $this->db->select("SELECT
                                        titulo,
                                        texto_1,
                                        texto_2,
                                        imagen
                                FROM
                                        error
                                WHERE
                                        id = 1");
        return $sql[0];
    }

    public function getLogos() {
        $sql = $this->db->select("select * from logos where id = 1");
        return $sql[0];
    }

    public function getInfoFooter() {
        $sql = $this->db->select("SELECT SUBSTR(contenido,1,300) as contenido from empresa");
        return strip_tags($sql[0]['contenido']);
    }

    public function getMetaTags($url) {
        $data = array();
        $title = '';
        $description = '';
        $keywords = '';
        $controlador = (!empty($url[0])) ? $url[0] : '';
        switch ($controlador) {
            case 'pantallas_led':
                $sql = $this->db->select("select title, description, keywords from pantallas_led where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
            case 'carteles_tradicionales':
                switch ($url[1]) {
                    case 'asuncion':
                        $sql = $this->db->select("select title, description, keywords from carteles_tradicionales where seccion = 'Asuncion'");
                        $title = utf8_encode($sql[0]['title']);
                        $description = utf8_encode($sql[0]['description']);
                        $keywords = utf8_encode($sql[0]['keywords']);
                        break;
                    case 'gran_asuncion':
                        $sql = $this->db->select("select title, description, keywords from carteles_tradicionales where seccion = 'Gran Asuncion'");
                        $title = utf8_encode($sql[0]['title']);
                        $description = utf8_encode($sql[0]['description']);
                        $keywords = utf8_encode($sql[0]['keywords']);
                        break;
                    case 'ruteros':
                        $sql = $this->db->select("select title, description, keywords from carteles_tradicionales where seccion = 'Ruteros'");
                        $title = utf8_encode($sql[0]['title']);
                        $description = utf8_encode($sql[0]['description']);
                        $keywords = utf8_encode($sql[0]['keywords']);
                        break;
                    case 'urbanos':
                        $sql = $this->db->select("select title, description, keywords from carteles_tradicionales where seccion = 'Urbanos'");
                        $title = utf8_encode($sql[0]['title']);
                        $description = utf8_encode($sql[0]['description']);
                        $keywords = utf8_encode($sql[0]['keywords']);
                        break;
                }
                break;
            case 'iconicos':
                $sql = $this->db->select("select title, description, keywords from iconicos where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
            case 'buses':
                $sql = $this->db->select("select title, description, keywords from buses where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
            case 'cobertura':
                $sql = $this->db->select("select title, description, keywords from cobertura where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
            case 'metricas':
                $sql = $this->db->select("select title, description, keywords from metricas where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
            case 'empresa':
                $sql = $this->db->select("select title, description, keywords from empresa where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
            case 'contacto':
                $sql = $this->db->select("select title, description, keywords from contacto where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
            default :
                $sql = $this->db->select("select title, description, keywords from index_meta where id = 1");
                $title = utf8_encode($sql[0]['title']);
                $description = utf8_encode($sql[0]['description']);
                $keywords = utf8_encode($sql[0]['keywords']);
                break;
        }

        $data = array(
            'description' => $title,
            'keywords' => $description,
            'title' => $keywords
        );
        return $data;
    }

}
