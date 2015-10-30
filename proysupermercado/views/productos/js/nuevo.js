$(document).ready(function(){
    $('#form1').validate({
        rules:{
            codigo:{
                required: true
            },
            nombre:{
                required: true
            },
            precio:{
                required: true
            },
            marca:{
                required: true
            },
            descuento:{
                required: true
            },
            descripcion:{
                required: true
            },
            tamanio:{
                required: true
            }
        },
        messages:{
            codigo: {
                required: "Debe introducir el titulo del post"
            },
            nombre:{
                required: "Debe introducir el cuerpo del post"
            },
            precio: {
                required: "Debe introducir el titulo del post"
            },
            marca: {
                required: "Debe introducir el titulo del post"
            },
            descuento: {
                required: "Debe introducir el titulo del post"
            },
            descripcion: {
                required: "Debe introducir el titulo del post"
            },
            tamanio: {
                required: "Debe introducir el titulo del post"
            }
        }
    });
});
