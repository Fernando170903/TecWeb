<?php
// Conexión a la base de datos
@$link = new mysqli('localhost', 'root', 'FMSJ170903', 'marketzone');

// Comprobar la conexión
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error . '<br/>');
}

// Capturar datos del formulario
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_POST['imagen'];

// Verificar si ya existe un producto con el mismo nombre, marca y modelo
$sql_verificar = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'";
$resultado = $link->query($sql_verificar);

if ($resultado->num_rows > 0) {
    echo 'Error: El producto con este nombre, marca y modelo ya existe en la base de datos.';
} else {
    // Comentar la inserción antigua que no usa column names
    // $sql_insertar = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";

    // Nueva sentencia INSERT INTO que usa column names (sin id ni eliminado)
    $sql_insertar = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                     VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";

    if ($link->query($sql_insertar)) {
        echo 'Producto insertado con éxito:<br/>';
        echo 'Nombre: ' . $nombre . '<br/>';
        echo 'Marca: ' . $marca . '<br/>';
        echo 'Modelo: ' . $modelo . '<br/>';
        echo 'Precio: ' . $precio . '<br/>';
        echo 'Detalles: ' . $detalles . '<br/>';
        echo 'Unidades: ' . $unidades . '<br/>';
        echo 'Imagen: ' . $imagen . '<br/>';

        echo '<br/>';
        echo "<a href='http://localhost/tecweb/practicas/p10/get_productos_xhtml_v2.php?tope=10000'>Ver todos los productos</a><br>";
        echo "<a href='http://localhost/tecweb/practicas/p10/get_productos_vigentes_v2.php?tope=1000'>Ver productos vigentes</a><br>";
        echo "<a href='http://localhost/tecweb/practicas/p10/formulario_productos.html'>Agregar nuevo producto</a>";

    } else {
        echo 'Error al insertar el producto: ' . $link->error;
    }
}

$link->close();
?>