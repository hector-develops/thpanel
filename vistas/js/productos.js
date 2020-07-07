mostrarProductos();

function constructorProductos() {

    var datosProducto = {

        Codigo: $("#codigoProducto").val(),
        Nombre: $("#nombreProducto").val().toUpperCase(),
        categoria: $("#categoriaProducto").val(),
        PrecioCompra: $("#precioProducto").val(),
        PrecioVenta: $("#ventaProducto").val(),
        umVenta: $("#umVentaProducto").val(),
        umCompra: $("#umCompraProducto").val(),
        Usuario: $("#idUsuarioProducto").val(),
        Foto: $("#nameImagenFoto1").val(),
    }

    
    return datosProducto;
}


function GuardarNuevoProducto() {

    const datos = constructorProductos();

    
    $.post("ajax/products.ajax.php", datos,
        function (response) {
            console.log(response);
            if (response) {
                swal({
                    type: "success",
                    title: "¡Producto Agregado Con Exito!",
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
    );

}


function mostrarProductos() {

    $('.tablaProductosPV').DataTable({
        "ajax": "ajax/datatable-productos.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }

    });

}

function validarProducto() {

    const datos = constructorProductos();

    var datosValidar = {
        codigoProductoValidar: datos.Código
    }

    var botonAgregarProducto = document.getElementById('guardarNewProducto');

    $.post("ajax/products.ajax.php", datosValidar,
        function (response) {

            if (response == 'ok') {
                botonAgregarProducto.disabled = true;

                swal({
                    type: "warning",
                    title: "El Producto Ya Existe!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then((result) => {
                    if (result.value) {
                        botonAgregarProducto.disabled = true;
                    }
                })
            } else {
                botonAgregarProducto.disabled = false;
            }
        }
    );

}

function subirImagenProducto(tipo) {

    var formData = new FormData();

    var dataImage = {
        inputFile: "#fotoProducto" + tipo,
        inputNameImage: "#nameImagenFoto" + tipo,
        divImage: "#imagenProducto" + tipo,
    }

    var files = $(dataImage.inputFile)[0].files[0];
    formData.append('file', files);

    $.ajax({
        url: 'ajax/products.ajax.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {

            const modeloImg = JSON.parse(response);
            var ruta = modeloImg;

            $(dataImage.inputNameImage).val(ruta);

            template = '<img src="' + ruta + '" class="img-thumbnail previsualizar" width="100px">';
            $(dataImage.divImage).html(template);

        }
    });
}

function editarProductoGet(codigo) {

    $("#modalEditarProducto").modal('show');

    const datos = { codigo_producto: codigo }

    $.ajax({
        type: "POST",
        url: 'ajax/products.ajax.php',
        data: datos,

        success: function (response) {
            // console.log(response);
            resultado = JSON.parse(response);
            $("#editarCodigo").val(resultado.codigo_producto);
            $("#editarDescripcion").val(resultado.nombre_producto);
            $("#editarPrecioInicio").val(resultado.precio_compra);
            $("#editarPrecioVendedora").val(resultado.precio_venta);
            $("#nameImagenFoto2").val(resultado.foto);


            template2 = '<img src="' + resultado.foto + '" class="img-thumbnail previsualizar" width="100px">';
            $('#imagenProducto2').html(template2);

        }
    });

}


function editarProductoPost() {

    const editProductos = {

        codigo_update: $("#editarCodigo").val(),
        nombre: $("#editarDescripcion").val(),
        precioCompra: $("#editarPrecioInicio").val(),
        precioVenta: $("#editarPrecioVendedora").val(),
        imagenProducto: $("#nameImagenFoto2").val()

    }


    $.post('ajax/products.ajax.php', editProductos,
        function (response) {

            if (response = "ok") {
                swal({
                    type: "success",
                    title: "¡Producto Editado Con Exito!",
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
                    title: "¡Error al editar el producto!",
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

$(".tablaProductosPV").on("click", ".btnBorrarProducto", function(){

    var idDeleteP = $(this).attr("idEliminaP");
    var fotoProductoD = $(this).attr("fotoProducto");

    let datosProductoD = {
        eliminacionP : idDeleteP,
        eliminacionFoto: fotoProductoD
    }

    $.ajax({
        type: "POST",
        url: "ajax/products.ajax.php",
        data: datosProductoD,
        success: function (response) {
            
        }
    });
    
  })


$(".tablaProductosPV").on("click", "button.btnStatuaProductos", function () {

    var codigoProducto = $(this).attr("codigoProducto");
    var statusProducto = $(this).attr("statusProducto");

    if (statusProducto === "0") {

        const datosmodelo = {
            idStatusProducto1: codigoProducto,
            statusProducto: statusProducto
        };

        $.ajax({
            type: "POST",
            url: "ajax/products.ajax.php",
            data: datosmodelo,
            success: function (response) {

            }
        });

        if (statusProducto == 1) {
            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
            $(this).html('No');
            $(this).attr('statusProducto', 0);
        } else if (statusProducto == 0) {
            $(this).addClass('btn-success');
            $(this).removeClass('btn-danger');
            $(this).html('Si');
            $(this).attr('statusProducto', 1);
        }
    } else if (statusProducto === "1") {

        const datosmodelo1 = {
            idStatusProducto2: codigoProducto,
            statusProducto: statusProducto
        };

        $.ajax({
            type: "POST",
            url: "ajax/products.ajax.php",
            data: datosmodelo1,
            success: function (response) {

                console.log(response);

            }
        });

        if (statusProducto == 1) {
            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
            $(this).html('No');
            $(this).attr('statusProducto', 0);
        } else if (statusProducto == 0) {
            $(this).addClass('btn-success');
            $(this).removeClass('btn-danger');
            $(this).html('Si');
            $(this).attr('statusProducto', 1);
        }
    }

})





function generarCodigoBarras() {

    const datos = { codigoBarraProductos: true }

    $.ajax({
        type: "POST",
        url: 'ajax/products.ajax.php',
        data: datos,

        success: function (response) {
            // console.log("response" + response);
            produtos = JSON.parse(response);

            var template2 = "";
            for (let i = 0; i < produtos.length; i++) {
                template2 += "<div id='targetModelos1' class='productosEtiquetas' style='height: 150px;width: 44%;float:left;padding: 20px;'>" +
                    "<center><P style='margin: 0;'><B>" + produtos[i].nombre_producto + "</B></P>" +
                    "<svg style='height:; width: 60% ; padding: 20px; height: 90px;' id=barcode" + produtos[i].codigo_producto + ">" +
                    "</center></div>";

            }


            console.log(template2);
            // $("#codigosBarra").html(template);

            $("#codigosBarra").append(template2);

            for (var i = 0; i < produtos.length; i++) {
                JsBarcode("#barcode" + produtos[i].codigo_producto, produtos[i].codigo_producto, {
                    format: "CODE39"
                });
            }
        }
    });
}
// width: 50%;float:left;padding: 25px;border: 1px solid black;
let agregarProductoCodigoBarra = (codigo, descripcion) => {

    var codigo_producto = codigo;
    var nombre_producto = descripcion;
    var template2 = "";
  
  
    template2 += "<div  style='outline-style: outset;width: 50%;float:left;padding: 25px;'>"+
    "<div id='targetModelos1' class='productosEtiquetas' style='outline-style: outset;width: 50%;float:left;padding: 25px;'>" +
    "<center><P style='margin: 0;'><B>" + nombre_producto + "</B></P>" +
    "<svg style='width: 50%' id=barcode" + codigo_producto + ">" +
    "</center></div>"+
    "</div>";

    $("#codigosBarra").append(template2);

    idBottonAdd = "#bootonAddCodBarra" + codigo_producto;

    $(idBottonAdd).removeClass('btn-default');
    $(idBottonAdd).addClass('btn-default disabled');
    JsBarcode("#barcode" + codigo_producto, codigo_producto, {
        format: "CODE39"
    });



}

function imprimirCodigosBarra() {

    $("#nuevoTipoCodBarras").val(0);
    var newReporteTipo = document.getElementById('nuevoTipoCodBarras');

    event.preventDefault();
    newReporteTipo.disabled = false;

    $('#nuevoTipoCodBarras').change(function () {
        var rep = $("#nuevoTipoCodBarras").val();
        var newReporteTipo = document.getElementById('nuevoTipoCodBarras');
        newReporteTipo.disabled = true;

        console.log(rep);

        if (rep == 1) {
            generarCodigoBarras();

            $("#fechasReporteCodBarra").css("display", "none");


        } if (rep == 2) {


            $("#SelectProductos").css("display", "block");


        }
    });
}


var resetPrintCode = () => {
    $("#SelectProductos").css("display", "none");
    $("#nuevoTipoCodBarras").val(0);
    var newReporteTipo = document.getElementById('nuevoTipoCodBarras');
    newReporteTipo.disabled = false;

}


function imprim2() {
    var mywindow = window.open('', 'PRINT', 'height=800,width=1000');
    mywindow.document.write(document.getElementById('codigosBarra').innerHTML);
    mywindow.document.close(); // necesario para IE >= 10
    mywindow.focus(); // necesario para IE >= 10
    mywindow.print();
    mywindow.close();
    // $("#codigosBarra").remove();
    location.reload();
    return true;
}


