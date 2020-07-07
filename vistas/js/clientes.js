
function constructorCliente(){
  
  var datos = {

    nombre : $("#nuevoCliente").val().toUpperCase(),
    telefono : $("#nuevoTelefono").val(),
    direccion : $("#nuevaDireccion").val().toUpperCase(),
    tipo : $("#tipoPersona").val()

  }

  return datos;
}


function guardarCliente(){

  var datosCliente = constructorCliente();
  console.log(datosCliente );


  $.ajax({
    type: "POST",
    url: "ajax/clientes.ajax.php",
    data: datosCliente,
    success: function (response) {
      
      console.log("response : " , response);
          if (response = "ok") {
            swal({
                type: "success",
                title: "¡Guaradado Correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function (result) {
                if (result.value) {
                    location.reload();
                }
            });
        } else {
            swal({
                type: "error",
                title: "¡Error al ingresar el producto!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function (result) {
                if (result.value) {
                    location.reload();
                }
            });
        }
    }
  });

}


function mostrarCliente(){
    
    $('#cliente-provedor').DataTable( {
        "ajax": "ajax/datatable-productos.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",		
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

        }

    } );

}

/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta cliente", respuesta);
      
      	   $("#idCliente").val(respuesta["id_cliente"]);
	       $("#editarCliente").val(respuesta["nombre_cliente"]);
	       $("#editarTelefono").val(respuesta["telefono_cliente"]);
	       $("#editarDireccion").val(respuesta["direccion_cliente"]);
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})


