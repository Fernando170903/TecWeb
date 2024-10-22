// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  "precio": 0.0,
  "unidades": 1,
  "modelo": "XX-000",
  "marca": "NA",
  "detalles": "NA",
  "imagen": "img/imagen.png"
};

function init() {
  /**
   * Convierte el JSON a string para poder mostrarlo
   * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
   */
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;

  // SE LISTAN TODOS LOS PRODUCTOS
  listarProductos();
}

function listarProductos() {
  $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      contentType: 'application/x-www-form-urlencoded',
      success: function(response) {
          let productos = JSON.parse(response);
          if (productos.length > 0) {
              let template = '';
              productos.forEach(producto => {
                  let descripcion =
                      `<li>precio: ${producto.precio}</li>
                       <li>unidades: ${producto.unidades}</li>
                       <li>modelo: ${producto.modelo}</li>
                       <li>marca: ${producto.marca}</li>
                       <li>detalles: ${producto.detalles}</li>`;
                  template +=
                      `<tr productId="${producto.id}">
                          <td>${producto.id}</td>
                          <td class="product-name">${producto.nombre}</td>
                          <td><ul>${descripcion}</ul></td>
                          <td>
                              <button class="product-delete btn btn-danger">Eliminar</button>
                          </td>
                      </tr>`;
              });
              $('#products').html(template);
          }
      }
  });
}

// Función de búsqueda de productos
$('#search').on('keyup', function() {
  let search = $(this).val();
  $.ajax({
      url: './backend/product-search.php',
      type: 'GET',
      data: { search },
      success: function(response) {
          let productos = JSON.parse(response);
          let template = '';
          let template_bar = '';
          productos.forEach(producto => {
              let descripcion =
                  `<li>precio: ${producto.precio}</li>
                   <li>unidades: ${producto.unidades}</li>
                   <li>modelo: ${producto.modelo}</li>
                   <li>marca: ${producto.marca}</li>
                   <li>detalles: ${producto.detalles}</li>`;
              template +=
                  `<tr productId="${producto.id}">
                      <td>${producto.id}</td>
                      <td class="product-name">${producto.nombre}</td>
                      <td><ul>${descripcion}</ul></td>
                      <td>
                          <button class="product-delete btn btn-danger">Eliminar</button>
                      </td>
                  </tr>`;
              template_bar += `<li>${producto.nombre}</li>`;
          });
          $('#products').html(template);
          $('#container').html(template_bar);
          $('#product-result').removeClass('d-none');
      }
  });
});

// Envío de formulario para agregar producto
$('#product-form').submit(function(e) {
  e.preventDefault();
  let productoJsonString = $('#description').val();
  let finalJSON = JSON.parse(productoJsonString);
  finalJSON['nombre'] = $('#name').val();
  productoJsonString = JSON.stringify(finalJSON);

  $.ajax({
      url: './backend/product-add.php',
      type: 'POST',
      contentType: "application/json;charset=UTF-8",
      data: productoJsonString,
      success: function(response) {
          let respuesta = JSON.parse(response);
          let template_bar =
              `<li style="list-style: none;">status: ${respuesta.status}</li>
               <li style="list-style: none;">message: ${respuesta.message}</li>`;
          $('#container').html(template_bar);
          $('#product-result').removeClass('d-none');
          listarProductos(); // Refresca la lista de productos
      }
  });
});

// Eliminar producto
$(document).on('click', '.product-delete', function() {
  if (confirm("¿De verdad deseas eliminar el producto?")) {
      let id = $(this).closest('tr').attr('productId');
      $.ajax({
          url: './backend/product-delete.php',
          type: 'GET',
          data: { id },
          success: function(response) {
              let respuesta = JSON.parse(response);
              let template_bar =
                  `<li style="list-style: none;">status: ${respuesta.status}</li>
                   <li style="list-style: none;">message: ${respuesta.message}</li>`;
              $('#container').html(template_bar);
              $('#product-result').removeClass('d-none');
              listarProductos(); // Refresca la lista de productos
          }
      });
  }
});

// Habilitar edición al hacer clic en el nombre del producto
$(document).on('click', '.product-name', function() {
  let id = $(this).closest('tr').attr('productId');
  $.ajax({
      url: './backend/product-list.php', // Se usa el mismo endpoint para obtener los detalles
      type: 'GET',
      success: function(response) {
          let productos = JSON.parse(response);
          let productoSeleccionado = productos.find(producto => producto.id == id);
          if (productoSeleccionado) {
              $('#name').val(productoSeleccionado.nombre);
              let JsonString = JSON.stringify(productoSeleccionado, null, 2);
              $('#description').val(JsonString);
              $('#productId').val(productoSeleccionado.id);
          }
      }
  });
});
