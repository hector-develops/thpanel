<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Productos y Servicios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Productos y Servicios</li>
    
    </ol>

  </section>
   

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          
          Agregar producto

        </button>
        <button class="btn btn-primary pull-right" data-toggle="modal" onclick="imprimirCodigosBarra();" data-target="#modalReporteCodBarras">
        <i class="fa fa-print">
          Imprimir Codigos Barra
        </i>
        </button>

      </div>


      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductosPV"   width="100%">
         
        <thead>
         
         <tr >
           
           <th style="width:10px">#</th>
           
           <th>Código</th>
           <th>Nombre</th>
           <th>Categoria</th>
           <th>Precio Compra</th>
           <th>Precio Venta</th>          
           <th>Estatus</th>
           <th>Foto</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>

       

       </table>

      </div>

    </div>



</section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: #667db6; background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Nuevo Producto/Servicio</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="form-group" style="display: none">
              <div class="col-xs-12 "  style="">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="hidden" id="idUsuarioProducto" value="<?php echo $_SESSION["id"]; ?>">
                </div>
              </div> 
            </div> 

            <!-- ENTRADA PARA EL CÓDIGO -->
            <label for="">Codigo</label>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" onchange="validarProducto();" id="codigoProducto" placeholder="Scanea / Ingresar código" required>

              </div>

            </div>
              
            <!-- ENTRADA PARA NOMBRE -->
            <label for="">Nombre</label>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="nombreProducto" placeholder="Ingresar nombre" required>

              </div>

            </div>
            
            <label for="">Categoria</label>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-xs" id="categoriaProducto" >
                  
                  <option value="">Categorias</option>

                  <?php

                    $item = null;
                    $valor = null;
                    $categoria = ControladorProductosPV::crtMostrarCategorias($item, $valor);
                    
                    foreach ($categoria as $key => $value) {
                    
                      echo '<option value="'.$value["idCategoria"].'">'.$value["nombreCategoria"].'</option>';
                    
                    }

                  ?>
  
                </select>

              </div>

            </div>


             <!-- ENTRADA PARA PRECIO COMPRA -->
            <label for="">Precio Compra</label>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="precioProducto" placeholder="Ingresar nombre" required>

              </div><br>

            
                <!-- ENTRADA PARA PRECIO MAYOREO -->
            <label for="">Precio Venta</label>

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="ventaProducto" name="codigoProducto" placeholder="Ingresar nombre" required>

              </div>

            </div>
            
          <!-- UNIDAD DE MEDIDA -->

          <label for="">Unidad de Medida Compra</label>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-xs" id="umCompraProducto" >
                  
                  <option value="">Unidad De Medida</option>

                  <?php

                    $item = null;
                    $valor = null;
                    $unidadMed = ControladorUnidadMedida::ctrMostrarUnidadMedida($item, $valor);
                    var_dump($unidadMed);
                    foreach ($unidadMed as $key => $value) {
                    
                      echo '<option value="'.$value["id_unidad_medida"].'">'.$value["descripcion"].'</option>';
                    
                    }

                  ?>
  
                </select>

              </div>

            </div>


            <!-- UNIDAD DE MEDIDA -->

            <label for="">Unidad de Medida Venta</label>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-xs" id="umVentaProducto" >
                  
                  <option value="">Unidad De Medida</option>

                  <?php

                    $item = null;
                    $valor = null;
                    $unidadMed = ControladorUnidadMedida::ctrMostrarUnidadMedida($item, $valor);
                    foreach ($unidadMed as $key => $value) {
                    
                      echo '<option value="'.$value["id_unidad_medida"].'">'.$value["descripcion"].'</option>';
                    
                    }

                  ?>

                </select>

              </div>

            </div>

            <!--ENTRADA PARA LA FOTO  -->   
            <div class="form-img" id="fotosPRodocu">
              <label for="descripcion">FOTO</label>  
              <input type="file" onchange="subirImagenProducto(1);"  class="form-control-file" name="image" id="fotoProducto1">
              <input type="hidden" value="vistas/img/plantilla/logo-blanco-bloque.png" id="nameImagenFoto1"  >
              <div id="imagenProducto1"> </div> 
            
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

          <button type="submit"  id="guardarNewProducto" class="btn btn-success" onclick="GuardarNuevoProducto();">Guardar</button>

        </div>

    </div>

  </div>

</div>
</div>


<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" d-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

  

            <!-- ENTRADA PARA EL CÓDIGO -->
            <label for="">Codigo Producto</label>
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="editarCodigo" name="editarCodigo" readonly>

              </div>

            </div>


            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <label for="">Descripcion Producto</label>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-xs" name="editarDescripcion" id="editarDescripcion" required>

              </div>

            </div>



             <!-- ENTRADA PARA PRECIO COMPRA -->

              <div class="form-group row">
                <div class="col-xs-12 col-sm-6">
                  <label for="">Precio Compra</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 
                    <input type="text" class="form-control input-xs" id="editarPrecioInicio" name="editarPrecioInicio" step="any" min="0" title="Precio Inicio" required>
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-6">
                      <label for="">Precio Venta</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-dollar "></i></span> 
                          <input type="text" class="form-control input-xs" id="editarPrecioVendedora" name="editarPrecioVendedora" step="any" min="0" title="Precio Vendedora" required>
                    </div>
                 </div>
               </div>

 
          </div>
            <!--ENTRADA PARA LA FOTO  -->   
            <div class="form-img">
              <label for="descripcion">FOTO</label>  
              <input type="file" onchange="subirImagenProducto(2);"  class="form-control-file" name="image" id="fotoProducto2">
              <input type="hidden" value="vistas/img/productos/default/anonymous.png" id="nameImagenFoto2"  >
              <div id="imagenProducto2"> </div> 
            
            </div>

          </div>    

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" onclick="editarProductoPost();">Guardar cambios</button>

        </div>


    </div>

  </div>

</div>

</div>



<!--=====================================
MODAL REPORTES BARRACODE
======================================-->

<div id="modalReporteCodBarras" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- <form id="reportesCodBarras" > -->

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="modal-title">Generar Codigos de Barra</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
          <div class="form-group">

            <!-- Tipo de recibo -->
             <label >Formato de Reporte</label>                            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check-square-o "></i></span> 
                <select  id="nuevoTipoCodBarras"  class="form-control">
                  <option value="0">Seleciona un formato</option>
                  <option value="1">Todos Productos</option>
                  <option value="2">Productos Selecionados  </option>
                </select> 
              </div>


            <!-- ENTRADA PARA LA FECHA DE INICIO -->

            <div id="SelectProductos" style="display: none; ">
            <br><br>
            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
              <thead>
                
                <tr>
                
                  <th style="width:10px">#</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Selecionar </th>
      
                </tr> 
      
              </thead>
      
              <tbody>
              <?php
                $item = null;
                $valor = null;

                $prodoctos = ControladorProductosPV::ctrMostrarProductosPV($item, $valor);

		            for($i = 0; $i < count($prodoctos); $i++){
                  echo " <tr>
                          <td>".($i)."</td>
                          <td>".$prodoctos[$i]["codigo_producto"]."</td>
                          <td>".$prodoctos[$i]["nombre_producto"]."</td>
                          <td><button type='button' id='bootonAddCodBarra".$prodoctos[$i]["codigo_producto"]."' class='btn btn-info' onclick='agregarProductoCodigoBarra(".$prodoctos[$i]["codigo_producto"].",\"".$prodoctos[$i]["nombre_producto"]."\")'><i class='fa fa-print'></i></button></td>
                        </tr>";
                  }
                ?>         
                </tbody>

                </table>
                
              </div>
            </div>
          </div>    

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" onclick="resetPrintCode();">Cancelar</button>

          <button  type="button" id="printCodBarras"class="btn btn-primary"onclick="imprim2()" value="imprimir div"  >Descargar</button>
        </div>

      </div>

    </div>

  </div>

</div>

<div id="areaImprimir" style="width: 100%; background-color: white; display: none"  > 
     
      <div id="codigosBarra" style="width: 100%; background-color: white;">
      </div>

</div> 
