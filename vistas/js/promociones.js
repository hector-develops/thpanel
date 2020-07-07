$(".txtProdcutoPromocionb").keyup(function(e) {
    var ref = $(".contenedorProdcutoPromocionb li");
    if(e.which === 40){
      abajoRecorrer(ref);
    }else if(e.which === 38){
      arribaRecorrer(ref);
    }else if(e.which === 13){
        enterProductopro();
    }
    else{
    var txt = $(".txtProdcutoPromocionb").val();
    if(txt.trim() === ""){
      $(".contenedorProdcutoPromocionb").hide();
      return ;
    }

      var producto = {
        txtProdcutoPromocionb : $(".txtProdcutoPromocionb").val()
      };

    $.ajax({
        url: 'ajax/promociones.ajax.php',
        type: 'POST',
        data: producto,
        success: function(response){
             console.log(response);
          let respuesta = JSON.parse(response);

      $(".contenedorProdcutoPromocionb").empty();
          
          if(respuesta.length > 0){
            $(".contenedorProdcutoPromocionb").show();
            for(var n in respuesta){
              nombre = respuesta[n]['nombre_producto'];
              var typeStyle = (n == 0)?"seleccionado":"deseleccionado";
            $(".contenedorProdcutoPromocionb").append("<li class='"+typeStyle+"' onclick='ejecutarProductospro("+respuesta[n]["codigo_producto"]+")' id='"+respuesta[n]["codigo_producto"]+"'>"+nombre+"</li>");
          }
      }else{
          $(".contenedorProdcutoPromocionb").hide();

        }
        }

      });
    }
});


function enterProductopro(){
  $(".contenedorProdcutoPromocionb li").each(function(){
    if($(this).hasClass("seleccionado")){
      producto = $(this).attr("id");
      $("#id_ProdcutoPromocionb").val(producto);
      $(".txtProdcutoPromocionb").val("").val($(this).text())
      $(".contenedorProdcutoPromocionb").hide()
      buscarproductospro();
      
    }
  });

}

function ejecutarProductospro(id) {
      producto = id;
      $(".contenedorProdcutoPromocionb li").each(function() {
          if ($(this).attr("id") == id) {
              $("#id_ProdcutoPromocionb").val(producto);
              $(".txtProdcutoPromocionb").val("").val($(this).text())
              $(".contenedorProdcutoPromocionb").hide()
              buscarproductospro();
          }
      });		  
  }
  

  function buscarproductospro(){
    producto = $("#id_ProdcutoPromocionb").val();
    folio = $("#nuevoFolioPromocion").val();


    console.log(producto);
    console.log(folio);

    const datosproducto ={
        prodctopro:producto
    };
    
    console.log(datosproducto);
    
    $.ajax({
        type: "POST",
        url: "ajax/promociones.ajax.php",
        data:datosproducto ,
        success: function (response) {
            console.log(response);

            respuesta = JSON.parse(response);
            console.log(respuesta);
            $.each(respuesta, function(key, value) {

                codigo_producto = respuesta.codigo_producto;
                nombre_producto = respuesta.nombre_producto;
                precio_compra = respuesta.precio_compra;
                precio_venta = respuesta.precio_venta;
                id_producto=respuesta.id_producto;
                existenciaprod=respuesta.existencias_producto;
                status_productos=respuesta.status_productos;
            })

            existencia=1;
            console.log(folio,codigo_producto,nombre_producto,precio_compra,precio_venta,existencia,id_producto,existenciaprod);

            var codigopromocion1 =["0000000"];
            $('.codigopromocion').each(function() {
                codigopromocion1.push($(this).text());
            }); 
            
          console.log("el producto que ya esta en la tabla es",codigopromocion1);
      
          var respuesta=codigopromocion1.includes(codigo_producto);
          console.log("el producto que ya esta en la tabla es",respuesta);

      
          if(respuesta===true){
            swal({
              type: "warning",
              title: "El producto ya existe",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
          }).then(function(result) {
              if (result.value) {
                 
      
              }
          })
           }else if(respuesta===false){

            var fila = "<tr><td class='foliopromocion'>" + folio +
            "</td><td class='codigopromocion'>" + codigo_producto +
            "</td><td class='nombreproductopromocion'>" + nombre_producto +
            "</td><td class='precio_ventaproductopromocion'id='precio_ventaproductopromocion"+id_producto+"' value='"+precio_venta+"'>" + precio_venta +
            "</td><input type='number' value='1'  min='0'   class='form-control CantPromocion' id='CantPromocion"+id_producto+"' style='width: 80px;' onchange='myFunctionPromocion("+id_producto+")'>"+
            "<td class='newtotalpromocion' id='newtotalpromocion"+id_producto+"'>"+ precio_venta +
            "</td><td><button type='button' class='btn btn-danger btnEliminarPromocion'>Eliminar</button></td></tr>";
    

           
          
            var btn = document.createElement("TR");
            btn.innerHTML = fila;
            document.getElementById("bodyagregarPromociones").appendChild(btn);
           }

            canttotal = 0
            $(".CantPromocion").each(
                function(index, value) {
                    canttotal = canttotal + eval($(this).val());
                }
            );
        
            preciototal = 0;
            $('.newtotalpromocion').each(function() {
                preciototal += parseFloat($(this).html()) || 0;
            });
          
        
             $("#totalProductosPromocion").val(canttotal);
             $("#totalPromociones").val(preciototal);
             $("#ProductoPromocion").val("");
             $("#ProdcutoPromocionb").val("");

        }

    })
}


    $('#ProductoPromocion').keyup(function(e) {
        if (e.which === 13) {

            productopromocion = $("#ProductoPromocion").val();
            folio = $("#nuevoFolioPromocion").val();


            // console.log(producto);
            // console.log(folio);

            const datosproducto ={
                prodctopro:productopromocion
            } 

            console.log(datosproducto)

            $.ajax({
                type: "POST",
                url: "ajax/promociones.ajax.php",
                data:datosproducto ,
                success: function (response) {
                    console.log(response);

                    respuesta = JSON.parse(response);
                    console.log(respuesta);
                    $.each(respuesta, function(key, value) {
        
                        codigo_producto = respuesta.codigo_producto;
                        nombre_producto = respuesta.nombre_producto;
                        precio_compra = respuesta.precio_compra;
                        precio_venta = respuesta.precio_venta;
                        id_producto=respuesta.id_producto;
                        existenciaprod=respuesta.existencias_producto;
                        status_productos=respuesta.status_productos;
                    })

                    existencia=1;
                    console.log(folio,codigo_producto,nombre_producto,precio_compra,precio_venta,existencia,id_producto,existenciaprod);

                    var codigopromocion1 =["0000000"];
                    $('.codigopromocion').each(function() {
                        codigopromocion1.push($(this).text());
                    }); 
                    
                  console.log("el producto que ya esta en la tabla es",codigopromocion1);
              
                  var respuesta=codigopromocion1.includes(codigo_producto);
                  console.log("el producto que ya esta en la tabla es",respuesta);

              
                  if(respuesta===true){
                    swal({
                      type: "warning",
                      title: "El producto ya existe",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                  }).then(function(result) {
                      if (result.value) {
                         
              
                      }
                  })
                   }else if(respuesta===false){

                    var fila = "<tr><td class='foliopromocion'>" + folio +
                    "</td><td class='codigopromocion'>" + codigo_producto +
                    "</td><td class='nombreproductopromocion'>" + nombre_producto +
                    "</td><td class='precio_ventaproductopromocion'id='precio_ventaproductopromocion"+id_producto+"' value='"+precio_venta+"'>" + precio_venta +
                    "</td><input type='number' value='1'  min='0'   class='form-control CantPromocion' id='CantPromocion"+id_producto+"' style='width: 80px;' onchange='myFunctionPromocion("+id_producto+")'>"+
                    "<td class='newtotalpromocion' id='newtotalpromocion"+id_producto+"'>"+ precio_venta +
                    "</td><td><button type='button' class='btn btn-danger btnEliminarPromocion'>Eliminar</button></td></tr>";
            

                   
                  
                    var btn = document.createElement("TR");
                    btn.innerHTML = fila;
                    document.getElementById("bodyagregarPromociones").appendChild(btn);
                   }

                    canttotal = 0
                    $(".CantPromocion").each(
                        function(index, value) {
                            canttotal = canttotal + eval($(this).val());
                        }
                    );
                
                    preciototal = 0;
                    $('.newtotalpromocion').each(function() {
                        preciototal += parseFloat($(this).html()) || 0;
                    });
                  
                
                     $("#totalProductosPromocion").val(canttotal);
                     $("#totalPromociones").val(preciototal);
                     $("#ProductoPromocion").val("");
                     $("#ProdcutoPromocionb").val("");

                }

            })

        }
        })

        $(".tablaPromociones").on("click", "button.btnEliminarPromocion", function() {

            document.getElementById("bodyagregarPromociones").deleteRow(0);
      
            canttotal = 0
            $(".CantPromocion").each(
                function(index, value) {
                    canttotal = canttotal + eval($(this).val());
                }
            );
        
            preciototal = 0;
            $('.newtotalpromocion').each(function() {
                preciototal += parseFloat($(this).html()) || 0;
            });
          
          
            $("#totalProductosPromocion").val(canttotal);
            $("#totalPromociones").val(preciototal);
      
          })

        function myFunctionPromocion(idproducto){
      
            idprod="#precio_ventaproductopromocion"+idproducto;
            idprodpa="#CantPromocion"+idproducto;
            idprodpa1="CantPromocion"+idproducto;

            prodtotal = 0
            $(idprodpa).each(
            function(index, value) {
            prodtotal = prodtotal + eval($(this).val());
            }
            );
            console.log("el  producto es",prodtotal);
    
            preciototal1 = 0;
            $(idprod).each(function() {
            preciototal1 += parseFloat($(this).html()) || 0;
            });
    
            console.log(preciototal1);
            
            multipromocion=prodtotal*preciototal1;
    
            idprodnew="newtotalpromocion"+idproducto;
        
            document.getElementById(idprodnew).innerHTML=multipromocion;


            canttotal = 0
            $(".CantPromocion").each(
                function(index, value) {
                    canttotal = canttotal + eval($(this).val());
                }
            );
        
            preciototal = 0;
            $('.newtotalpromocion').each(function() {
                preciototal += parseFloat($(this).html()) || 0;
            });
          
        
             $("#totalProductosPromocion").val(canttotal);
             $("#totalPromociones").val(preciototal);
          
    
        }    

              
        $("#GuardarPromocion").on("click", function() {
            idvenpromocion= $("#idVendedorPromocion").val();
            foliopromocion= $("#nuevoFolioPromocion").val();
            nombrepromocion= $("#NombrePromocion").val();
            fechainicialpro= $("#FechaInicioPro").val();
            fechafinalpro= $("#FechaFinalPro").val();
            tproductospro= $("#totalProductosPromocion").val();
            totalpromocion= $("#totalPromociones").val();
            newtotalpromocion= $("#preciopromocion").val();

            if(idvenpromocion.length > 0 && foliopromocion.length > 0 && nombrepromocion.length > 0 && fechainicialpro.length > 0 && fechafinalpro.length > 0 && newtotalpromocion.length > 0 && totalpromocion.length > 0 && tproductospro.length > 0){

                const datospromocion={
                    vendedorid:idvenpromocion,
                    promocionfolio:foliopromocion,
                    promocionnombre:nombrepromocion,
                    inicialfechapro:fechainicialpro,
                    finalfechapro:fechafinalpro,
                    ptotalespro:tproductospro,
                    prototal:totalpromocion,
                    totalnewpro:newtotalpromocion

                };

                console.log(datospromocion);


                $.ajax({
                    url: "ajax/promociones.ajax.php",
                    method: "POST",
                    data: datospromocion,
                    success: function(response) {
                      respuesta=JSON.parse(response);
                        if(respuesta==="ok"){

                            var foliopromocion = [];
                            var codigopromocion = [];
                            var precio_ventaproductopromocion = [];
                            var newtotalpromocion = [];
                            var CantPromocion = [];
                           
                           
                            $('.foliopromocion').each(function() {
                                foliopromocion.push($(this).text());
                            });
                  
                            $('.codigopromocion').each(function() {
                                codigopromocion.push($(this).text());
                            });
                  
                            $('.precio_ventaproductopromocion').each(function() {
                                precio_ventaproductopromocion.push($(this).text());
                            });
                  
                            $('.newtotalpromocion').each(function() {
                                newtotalpromocion.push($(this).text());
                            });
                  
                  
                            $('.CantPromocion').each(function () {
                                CantPromocion.push($(".CantPromocion").val());    
                          });

                            $.ajax({
                                url: "ajax/promociones.ajax.php",
                                method: "POST",
                                data: { foliopromocion: foliopromocion, codigopromocion: codigopromocion, precio_ventaproductopromocion: precio_ventaproductopromocion, CantPromocion: CantPromocion,newtotalpromocion: newtotalpromocion,},
                    
                                success: function(response) {
                                  console.log(response);
                                 
                                  if (response = "ok") {
                                   
                    
                                    swal({
                                        type: "success",
                                        title: "Guardado correctamente",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                    }).then(function(result) {
                                        if (result.value) {
                                            window.location = "mostrar-promociones";
                    
                                        }
                                    })
                    
                                } else {
                                  
                                    swal({
                                        type: "error",
                                        title: "¡Hubo un error comunicate con el departamento de sistemas!!!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                    }).then(function(result) {
                                        if (result.value) {
                    
                                            window.location = "mostrar-promociones";
                    
                                        }
                                    })
                    
                                }
                                  }

                                })

                        }
                          

                    }
                })
            }else{
                swal({
                    type: "warning",
                    title: "Revice que todos los datos sean correctos",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                       
            
                    }
                })
            }

        })


        $('.tablaMostrarPromociones').DataTable({
            "ajax": "ajax/datatable-mostrarpromociones.ajax.php",
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


// $(".tablaMostrarPromociones").on("click", "button.btnEditarPromocion", function() {
    
   
//     verdetallespro();
// })

function verdetpromociones(codigo){
    // var code_promocion = $(this).attr("code_promocion");
    $('#modalEditarPromociones').modal('show'); 
    console.log(codigo);
    $("#EditarCodigoPromocion").val(codigo);
    


 const datosdetallepromocion = { codigopromocion: codigo };

 $.ajax({
    url: "ajax/promociones.ajax.php",
    method: "POST",
    data: datosdetallepromocion,

    success: function(response) {
        console.log(response);

        respuesta = JSON.parse(response);
        console.log(respuesta);

        var detalles = ''


        $.each(respuesta, function(key, value) {



            detalles += "<tr>" +


                "<td>" + value.fk_code_promocion + "</td>" +

                "<td>" + value.nombre_producto + "</td>" +

                "<td>" + value.cant_prod + "</td>" +

                "<td>" + value.total_costo + "</td>" +

                "<td><center><button type='button' class='btn btn-danger btnDeletePromocion' id='ImprimirValeMaquila'   idPromocion='"+ value.id_det_promocion +"'  ><i class='fa fa-trash'>Eliminar</i></button></center></td>"+

                "</tr>";


        })

        $("#visualizarDetallePromocion").html(detalles);




    }


    })
}
$(".tablaDetallesPromociones").on("click", "button.btnDeletePromocion", function() {
    
    swal({
        title: 'Eliminar promoción',
        text: "¿Estas Seguro de Cerrar la caja?",
        type: 'warning',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonText: 'Si!'
      }).then((result) => {

        if (result.value) {

            var idPromociondelete = $(this).attr("idPromocion");
            codigo= $("#EditarCodigoPromocion").val();
            
            console.log(idPromociondelete);

            const eliminardetallepro={
                idprodel:idPromociondelete
            };
            $.ajax({
                type: "POST",
                url: "ajax/promociones.ajax.php",
                data: eliminardetallepro,
                success: function (response) {
                    respuesta=JSON.parse(response);
                    if(respuesta==="ok"){
                    verdetpromociones(codigo);

                    }else{
                        swal({
                            type: "error",
                            title: "¡Hubo un error comunicate con el departamento de sistemas!!!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
        
                                window.location = "mostrar-promociones";
        
                            }
                        })
                    }
                }
            });


        } else {

            // window.location = "salida-almacen";
      
          }
        })
    

})