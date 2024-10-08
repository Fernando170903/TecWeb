<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Celulares</title>
    <script>
        function validarFormulario() {
            var nombre = document.getElementById('nombre').value;
            if (nombre === "" || nombre.length > 100) {
                alert("El nombre del producto es requerido y debe tener 100 caracteres o menos.");
                return false;
            }

            var marca = document.getElementById('marca').value;
            if (marca === "") {
                alert("La marca es requerida.");
                return false;
            }

            var modelo = document.getElementById('modelo').value;
            var modeloRegex = /^[a-zA-Z0-9]+$/;
            if (modelo === "" || !modeloRegex.test(modelo) || modelo.length > 25) {
                alert("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
                return false;
            }

            var precio = parseFloat(document.getElementById('precio').value);
            if (isNaN(precio) || precio <= 99.99) {
                alert("El precio es requerido y debe ser mayor a 99.99.");
                return false;
            }

            var detalles = document.getElementById('detalles').value;
            if (detalles.length > 250) {
                alert("Los detalles deben tener 250 caracteres o menos.");
                return false;
            }

            var unidades = parseInt(document.getElementById('unidades').value);
            if (isNaN(unidades) || unidades < 0) {
                alert("Las unidades son requeridas y deben ser mayor o igual a 0.");
                return false;
            }

            var imagen = document.getElementById('imagen').value;
            if (imagen === "") {
                document.getElementById('imagen').value = "img/imagen.png";  // Ruta por defecto
            }

            return true;
        }
    </script>
</head>
<body>
    <?php
        // Conectar a la base de datos
        @$link = new mysqli('localhost', 'root', 'FMSJ170903', 'marketzone');

        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error);
        }

        // Verificar si se recibe un ID para modificar el producto
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);

            // Consulta para obtener los detalles del producto
            $query = "SELECT * FROM productos WHERE id = $id";
            $result = $link->query($query);

            if ($result && $result->num_rows > 0) {
                $producto = $result->fetch_assoc();
            } else {
                echo "<p>No se encontró el producto con ID $id.</p>";
            }
            $link->close();
        }
    ?>

    <h1><?= isset($producto) ? 'Modificar Producto' : 'Registrar un Nuevo Producto' ?></h1>
    <form action="set_producto_v2.php" method="POST" onsubmit="return validarFormulario()">
        <!-- Si hay un producto, enviamos también el ID -->
        <?php if (isset($producto)): ?>
            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
        <?php endif; ?>

        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" value="<?= isset($producto) ? htmlspecialchars($producto['nombre']) : '' ?>" required><br><br>

        <label for="marca">Marca:</label>
        <select id="marca" name="marca" required>
            <option value="">Seleccione una marca</option>
            <option value="Samsung" <?= isset($producto) && $producto['marca'] == 'Samsung' ? 'selected' : '' ?>>Samsung</option>
            <option value="Apple" <?= isset($producto) && $producto['marca'] == 'Apple' ? 'selected' : '' ?>>Apple</option>
            <option value="Xiaomi" <?= isset($producto['marca']) && $producto['marca'] == 'Xiaomi' ? 'selected' : '' ?>>Xiaomi</option>
            <option value="Oppo" <?= isset($producto['marca']) && $producto['marca'] == 'Oppo' ? 'selected' : '' ?>>Oppo</option>
            <option value="Google" <?= isset($producto['marca']) && $producto['marca'] == 'Google' ? 'selected' : '' ?>>Google</option>
            <option value="Motorola" <?= isset($producto['marca']) && $producto['marca'] == 'Motorola' ? 'selected' : '' ?>>Motorola</option>
            <option value="Huawei" <?= isset($producto['marca']) && $producto['marca'] == 'Huawei' ? 'selected' : '' ?>>Huawei</option>
            <option value="Realme" <?= isset($producto['marca']) && $producto['marca'] == 'Realme' ? 'selected' : '' ?>>Realme</option>
        </select><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?= isset($producto) ? htmlspecialchars($producto['modelo']) : '' ?>" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" value="<?= isset($producto) ? htmlspecialchars($producto['precio']) : '' ?>" required><br><br>

        <label for="detalles">Detalles:</label>
        <textarea id="detalles" name="detalles"><?= isset($producto) ? htmlspecialchars($producto['detalles']) : '' ?></textarea><br><br>

        <label for="unidades">Unidades disponibles:</label>
        <input type="number" id="unidades" name="unidades" value="<?= isset($producto) ? htmlspecialchars($producto['unidades']) : '' ?>" required><br><br>

        <label for="imagen">Imagen (ruta):</label>
        <input type="text" id="imagen" name="imagen" value="<?= isset($producto) ? htmlspecialchars($producto['imagen']) : '' ?>"><br><br>

        <input type="submit" value="<?= isset($producto) ? 'Modificar Producto' : 'Registrar Producto' ?>">
    </form>
</body>
</html>