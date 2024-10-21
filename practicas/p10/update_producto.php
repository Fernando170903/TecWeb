<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "FMSJ170903", "marketzone");

// Verifica la conexión
if ($link === false) {
    die("ERROR: No pudo conectarse a la DB. " . mysqli_connect_error());
}

// Verifica que los datos se hayan enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['modelo']);
    $precio = floatval($_POST['precio']);
    $detalles = mysqli_real_escape_string($link, $_POST['detalles']);
    $unidades = intval($_POST['unidades']);
    $imagen = mysqli_real_escape_string($link, $_POST['imagen']);

    // Consulta para actualizar el producto
    $sql = "UPDATE productos SET 
                nombre='$nombre', 
                marca='$marca', 
                modelo='$modelo', 
                precio='$precio', 
                detalles='$detalles', 
                unidades='$unidades', 
                imagen='$imagen'
            WHERE id=$id";

    // Ejecuta la actualización
    if (mysqli_query($link, $sql)) {
        echo "Producto actualizado correctamente.";
        echo "Producto actualizado correctamente.<br>";
        echo "<a href='http://localhost/tecweb/practicas/p10/get_productos_xhtml_v2.php?tope=10000'>Ver todos los productos</a><br>";
        echo "<a href='http://localhost/tecweb/practicas/p10/get_productos_vigentes_v2.php?tope=1000'>Ver productos vigentes</a><br>";
        echo "<a href='http://localhost/tecweb/practicas/p10/formulario_productos.html'>Agregar nuevo producto</a>";
    } else {
        echo "ERROR: No se ejecutó $sql. " . mysqli_error($link);
    }
}

// Cierra la conexión
mysqli_close($link);
?>