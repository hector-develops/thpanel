traerDatosInpus();

function datosEmpresa(){

    var datos = {

        razon_social :$("#inputName").val(),
        rfc_empresa :$("#inputRFC").val(),
        telefono :$("#inputTelefono").val(),
        descripcion :$("#inputDescripcion").val(),
        correo :$("#inputCorreo").val(),
        celular_empresa :$("#inputCelular").val(),
        facebook_empresa :$("#inputFacebook").val(),
        instagram_empresa :$("#inputInstagram").val(),
        titulo_inicio :$("#inputIniciot").val(),
        logo :$("#idLogoEmpresa1").val(),
        icono :$("#iconoEmpresa").val(),

    }

    return datos;

}

function updateDatosEmpresa(){

    var datos = datosEmpresa();
    console.log(datos);

    $.ajax({
        type: "POST",
        url: "ajax/empresa.ajax.php",
        data: datos,

        success: function (response) {
            
            if (response = "ok") {
                swal({
                    type: "success",
                    title: "¡Empresa Editada Con Exito!",
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
                    title: "¡Error al editar la Empresa!",
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


function traerDatosInpus(){

    datos = { id_empresa : '1'}

    $.post("ajax/empresa.ajax.php", datos,
        function (response) {
         
            respues = JSON.parse(response);
            
            
            $("#inputName").val(respues.razon_social);
            $("#inputRFC").val(respues.rfc_empresa);
            $("#inputTelefono").val(respues.telefono);
            $("#inputDescripcion").val(respues.descripcion);
            $("#inputCorreo").val(respues.correo);
            $("#inputDirecion").val(respues.direccion);
            $("#inputCelular").val(respues.celular_empresa);
            $("#inputFacebook").val(respues.facebook_empresa);
            $("#inputInstagram").val(respues.instagram_empresa);
            $("#inputIniciot").val(respues.titulo_inicio);
            $("#idLogoEmpresa1").val(respues.logo);
            $("#iconoEmpresa").val(respues.icono);

        
        }
    );


    return datos;
}

function subirImagenEmpresa(tipo) {

    var formData = new FormData();

    var dataImage = {
        inputFile: "#fotoEmpresa" + tipo,
        inputNameImage: "#iconoEmpresa" + tipo,
        divImage: "#imagenEmpresa" + tipo,
    }


    var files = $(dataImage.inputFile)[0].files[0];
    formData.append('file', files);

    $.ajax({
        url: 'ajax/empresa.ajax.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
    });


}