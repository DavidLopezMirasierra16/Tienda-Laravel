/** 
 * Funcion que nos manda a la url
*/ 
function redirigirBusquedaCategoria(){
    const opcion = document.getElementById("categoria_busqueda");
    let valor = opcion.value;
    window.location.href = "/productos/categoria/" + valor;
}

/**
 * Funcion que nos busca por el input
 */ 
function buscarInput(){
    const texto = document.getElementById("producto_buscar");
    let contenido = texto.value;
    window.location.href = "/productos/busqueda/"+contenido;
}