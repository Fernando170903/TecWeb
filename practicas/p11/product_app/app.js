// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
};

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n' + client.responseText);

            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');

            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if (Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                descripcion += '<li>precio: ' + productos.precio + '</li>';
                descripcion += '<li>unidades: ' + productos.unidades + '</li>';
                descripcion += '<li>modelo: ' + productos.modelo + '</li>';
                descripcion += '<li>marca: ' + productos.marca + '</li>';
                descripcion += '<li>detalles: ' + productos.detalles + '</li>';

                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id=" + id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar Producto"
function buscarProducto(e) {
    e.preventDefault();

    // SE OBTIENE EL TÉRMINO DE BÚSQUEDA
    var searchTerm = document.getElementById('search-term').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n' + client.responseText);

            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);

            // SE VERIFICA SI EL OBJETO JSON TIENE PRODUCTOS
            if (productos.length > 0) {
                let template = '';

                // SE CREA UNA FILA HTML PARA CADA PRODUCTO ENCONTRADO
                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: ' + producto.precio + '</li>';
                    descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                    descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                    descripcion += '<li>marca: ' + producto.marca + '</li>';
                    descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                    template +=
                        `<tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>`;
                });

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            } else {
                // SI NO HAY RESULTADOS, SE LIMPIA LA TABLA
                document.getElementById("productos").innerHTML = '<tr><td colspan="3">No se encontraron productos.</td></tr>';
            }
        }
    };
    // Asegúrate de enviar 'search'
    client.send("search=" + searchTerm);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    var nombreProducto = document.getElementById('name').value;

    // Verificar si el nombre está vacío
    if (nombreProducto === "") {
        window.alert("El nombre del producto es obligatorio.");
        return;
    }

    var productoJsonString = document.getElementById('description').value;

    try {
        // Validar si el JSON es válido
        var finalJSON = JSON.parse(productoJsonString);
    } catch (error) {
        window.alert("El formato del JSON es incorrecto.");
        return;
    }

    // Validaciones del JSON (similar a la práctica anterior)
    if (typeof finalJSON.precio !== 'number' || finalJSON.precio <= 0) {
        window.alert("El precio debe ser un número mayor a 0.");
        return;
    }

    if (typeof finalJSON.unidades !== 'number' || finalJSON.unidades <= 0) {
        window.alert("Las unidades deben ser un número mayor a 0.");
        return;
    }

    if (!finalJSON.modelo || finalJSON.modelo === "") {
        window.alert("El modelo del producto es obligatorio.");
        return;
    }

    if (!finalJSON.marca || finalJSON.marca === "") {
        window.alert("La marca del producto es obligatoria.");
        return;
    }

    if (!finalJSON.detalles || finalJSON.detalles === "") {
        window.alert("Los detalles del producto son obligatorios.");
        return;
    }

    if (!finalJSON.imagen || finalJSON.imagen === "") {
        window.alert("La URL de la imagen es obligatoria.");
        return;
    }

    // Agregar el nombre al JSON
    finalJSON['nombre'] = nombreProducto;

    // Convertir de vuelta a string
    productoJsonString = JSON.stringify(finalJSON);

    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            var response = JSON.parse(client.responseText);

            if (response.error) {
                window.alert(response.error);  // Mostrar mensaje de error si el producto ya existe
            } else if (response.success) {
                window.alert(response.success);  // Mostrar mensaje de éxito si el producto fue insertado correctamente
            }
        }
    };
    client.send(productoJsonString);
}


// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try {
        objetoAjax = new XMLHttpRequest();
    } catch (err1) {
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try {
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
}