function obtenerDatosProducto(producto) {
    const id = producto.getAttribute('data-id');
    const nombre = producto.getAttribute('data-nombre');
    const precio = parseFloat(producto.getAttribute('data-precio'));

    // Agregar al carrito y enviar al servidor
    agregarAlCarritoDOM(id, nombre, precio);
    enviarAlServidor(id);
}

function enviarAlServidor(producto_id) {
    const xhr = new XMLHttpRequest();
    const url = 'ruta_hacia_tu_archivo_php.php';
    const params = 'producto_id=' + producto_id;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };

    xhr.send(params);
}