<?php
namespace MyApi;

abstract class DataBase {
    protected $conexion;

    public function __construct($host = 'localhost', $user = 'root', $password = 'FMSJ170903', $db = 'marketzone') {
        $this->conexion = @mysqli_connect($host, $user, $password, $db);

        if (!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }

    abstract protected function query($sql);
}
?>
