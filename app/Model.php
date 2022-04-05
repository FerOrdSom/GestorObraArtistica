<?php

class Model extends PDO {

    protected $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO('mysql:host=' . Config::$mvc_bd_hostname . ';dbname=' . Config::
                    $mvc_bd_nombre . '', Config::$mvc_bd_usuario, Config::$mvc_bd_clave);
            // Realiza el enlace con la BD en utf-8
            $this->conexion->exec("set names utf8");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<p>Error: No puede conectarse con la base de datos.</p>\n";
            echo "<p>Error: " . $e->getMessage();
        }
    }

    public function consulta_users() {
        try {
            $consulta = "select * from usuarios";
            $result = $this->conexion->query($consulta)->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage();
        }
    }

}

?>