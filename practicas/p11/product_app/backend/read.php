<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SI SE RECIBE UN ID, SE HACE LA BÚSQUEDA POR ID
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ($result = $conexion->query("SELECT * FROM productos WHERE id = '{$id}'")) {
            $row = $result->fetch_array(MYSQLI_ASSOC);

            if (!is_null($row)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach ($row as $key => $value) {
                    $data[$key] = utf8_encode($value);
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }

    // SI NO SE RECIBE UN ID PERO SE RECIBE UN TÉRMINO DE BÚSQUEDA, SE HACE BÚSQUEDA GENERAL
    } else if (isset($_POST['search'])) {
        $searchTerm = $_POST['search'];  // Se usa 'search' para coincidir con el nombre enviado desde el frontend
        $searchTerm = $conexion->real_escape_string($searchTerm); // Para evitar inyecciones SQL

        // SE REALIZA LA BÚSQUEDA POR NOMBRE, MARCA O DETALLES UTILIZANDO LIKE
        $query = "
            SELECT * 
            FROM productos 
            WHERE nombre LIKE '%$searchTerm%' 
               OR marca LIKE '%$searchTerm%' 
               OR detalles LIKE '%$searchTerm%'
        ";

        if ($result = $conexion->query($query)) {
            // SE RECORREN TODOS LOS RESULTADOS Y SE AÑADEN AL ARRAY $data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $producto = array();
                    foreach ($row as $key => $value) {
                        $producto[$key] = utf8_encode($value);
                    }
                    $data[] = $producto; // AÑADIMOS CADA PRODUCTO AL ARRAY GENERAL
                }
            } else {
                $data['message'] = "No se encontraron resultados para el término de búsqueda: $searchTerm";
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
    
    // SE CIERRA LA CONEXIÓN
    $conexion->close();
?>