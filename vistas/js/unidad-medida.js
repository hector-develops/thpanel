$('#tablaUnidadMedida').DataTable();

function getUnidadMedida(){

    const datosUnidadMedida = {
        codigoUnidadMedida :  $("#codUnidadMed").val(),
        descripcion :  $("#nuevaDesUnidadMed").val().toUpperCase(),
        abreviacion :  $("#nuevaAbreviacion").val().toUpperCase(),
    }

    return datosUnidadMedida;

}

function agragarUnidadMedida(){


    datos = getUnidadMedida();  
    console.log(datos);
    
    $.post("ajax/unidad-medida.ajax.php", datos,
        function (response) {
        
        console.log(response);   
        
            if (response = "ok") {
                swal({
                    type: "success",
                    title: "La Unidad de Medida fue agregada con exito!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        location.reload();
                    }
                });
            } else {
                swal({
                    type: "error",
                    title: "¡Error al ingresar los datos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        location.reload();
                    }
                });
            }
        
        }
    );

}

