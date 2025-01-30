function borrar(cod_contacto,nombre){
    if (confirm("¿Estás seguro de que quieres borrar este contacto?  "+cod_contacto+": "+nombre+"?")){
        // Link para poder redirigir con php
        window.location= "borrar_contacto.php?cod_contacto="+cod_contacto;
    }else{
        alert("Borrado cancelado");
    }
}