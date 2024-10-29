<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'FMSJ170903',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Error de conexión (' . mysqli_connect_errno() . '): ' . mysqli_connect_error() . '!');
    }
    
?>