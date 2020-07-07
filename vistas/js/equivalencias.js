function constructorEquivalencias(){

	var datos = {

		codigo_equivalencia : $("#nuevaEquivalenciaCodigo").val(),
		descripcion_equivalencia : $("#nuevaEquivalencia").val().toUpperCase(),
		unidad_medida : $("#unidadMedida_equivalente").val(),
		cantidad : $("#nuevaCantidad").val(),

	}

	return datos;

}

function agregarEquivalencia(){

	var datos = constructorEquivalencias();
	$.post("ajax/equivalencias.ajax.php", datos,
		function (response) {
			if (response = "ok") {
                swal({
                    type: "success",
                    title: "¡Equivalencia Agregada Con Exito!",
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
                    title: "¡Error al ingresar la equivalencia!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function (result) {
                    if (result.value) {
                        location.reload();
                    }
                });
            }
		}
	);
}



function validarEquivalencia() {


    const datos = constructorEquivalencias();

    var datosValidar = {
        codigoEquivalenciaValidar: datos.codigo_equivalencia
    }
    console.log(datosValidar);
    var botonAgregarEquivalencia = document.getElementById('guardarNewEquivalencia');

    $.post("ajax/equivalencias.ajax.php", datosValidar,
        function (response) {

            console.log(response);

            if (response == 'ok') {
                botonAgregarEquivalencia.disabled = true;

                swal({
                    type: "warning",
                    title: "El Equivalencia Ya Existe!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then((result) => {
                    if (result.value) {
                        botonAgregarEquivalencia.disabled = true;
                    }
                })
            } else {
                botonAgregarEquivalencia.disabled = false;
            }
        }
    );

}
