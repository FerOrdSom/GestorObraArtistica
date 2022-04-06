<?php

require_once __DIR__ . '\..\app\Config.php';
require_once __DIR__ . '\..\app\Model.php';

class Controller {

    public function login() {
        require __DIR__ . '/templates/login.php';
    }

    public function registro() {
        $m = new Model();
        $form = array("usuario" => '',
            "password" => '',
            "password_2" => '');
        $form = $_POST;
        
        if (!empty($form['usuario']) ||
                !empty($form['password']) ||
                !empty($form['password_2'])) {
            echo "Todos los campos son obligatorios" . "<br>";
                        
        }
        if ((!empty($form['password']) && !empty($form['password_2']))){
            if ($form['password'] != $form['password_2']){
            echo "Los password deben coincidir" . "<br>";            
            } else {
                header( "Location: https://localhost/Gestor/web/index.php?ctl=inicio");                
            }
        }
//        print_r($_POST);
//        print_r($form);

        if (!empty($form['password']) && !isset($_POST['password'])) {
            echo "password required";
            
        }
        require __DIR__ . '/templates/registro.php';
    }

    public function inicio() {
        if (isset($_POST['usuario']) && $_POST['usuario'] != NULL) {
            echo "existe el usuario" . $_POST['usuario'] . "<br>";
        }
        $m = new Model();
        $result = array('usuarios' => $m->consulta_users());
        echo '<pre>';
        print_r($result);
        echo '</pre>' . "<br>";
        echo $result['usuarios']['0']['name'] . "<br>";
        require __DIR__ . '/templates/inicio.php';
    }

//    public function inicio() {
//        $params = array(
//            'mensaje' => 'Bienvenido al repositorio de alimentos',
//            'fecha' => date('d-m-yyy'),
//        );
//        require __DIR__ . '/templates/inicio.php';
//    }
//
//    public function listar() {
//        $m = new Model(Config::$mvc_bd_nombre,
//                Config::$mvc_bd_usuario,
//                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
//        $params = array(
//            'alimentos' => $m->dameAlimentos(),
//        );
//        require __DIR__ . '/templates/mostrarAlimentos.php';
//    }
//
//    public function insertar() {
//        $params = array(
//            'nombre' => '', 'energia' => '', 'proteina' => '', 'hc' => '', 'fibra' => '', 'grasa' => '',);
//        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario, Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            // comprobar campos formulario 
//            if ($m->validarDatos($_POST['nombre'], $_POST['energia'],
//                            $_POST['proteina'], $_POST['hc'],
//                            $_POST['fibra'], $_POST['grasa'])) {
//                $m->insertarAlimento($_POST['nombre'],
//                        $_POST['energia'], $_POST['proteina'], $_POST['hc'],
//                        $_POST['fibra'], $_POST['grasa']);
//                header('Location: index.php?ctl=listar');
//            } else {
//                $params = array(
//                    'nombre' => $_POST['nombre'], 'energia' => $_POST['energia'],
//                    'proteina' => $_POST['proteina'], 'hc' => $_POST['hc'],
//                    'fibra' => $_POST['fibra'], 'grasa' => $_POST['grasa'],);
//                $params['mensaje'] = 'No se ha podido insertar el alimento. Revisa el formulario';
//            }
//        }
//        require __DIR__ . '/templates/formInsertar.php';
//    }
//
//    public function buscarPorNombre() {
//        $params = array(
//            'nombre' => '',
//            'resultado' => array(),
//        );
//        $m = new Model(Config::$mvc_bd_nombre,
//                Config::$mvc_bd_usuario,
//                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            $params['nombre'] = $_POST['nombre'];
//            $params['resultado'] = $m->buscarAlimentosPorNombre($_POST['nombre']);
//        }
//        require __DIR__ . '/templates/buscarPorNombre.php';
//    }
//
//    public function ver() {
//        if (!isset($_GET['id'])) {
//            throw new Exception('Página no encontrada');
//        }
//        $id = $_GET['id'];
//        $m = new Model(Config::$mvc_bd_nombre,
//                Config::$mvc_bd_usuario,
//                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
//        $alimento = $m->dameAlimento($id);
//        $params = $alimento;
//
//        require __DIR__ . '/templates/verAlimento.php';
//    }
}

?>