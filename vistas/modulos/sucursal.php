<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Sucursales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Sucursales</li>
    
    </ol>

  </section>
   

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarScursal">
          
          Agregar Sucursale

        </button>


      </div>


 <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaSucursales" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código Tienda</th>
           <th>Razon Social</th>
           <th>Direccion</th>
           <th>Telefono</th> 
           <th>Ciudad</th>
           <th>Estado</th>
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          <?php

          $item= null;
          $valor=null;

          $sucursales=ControladorSucursales::ctrMostrarSucursales($item, $valor);

          
          foreach ($sucursales as $key => $value) {
           

           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo_sucursal"].'</td>

                  <td>'.$value["nombre_sucursal"].'</td>

                  <td>'.$value["direccion_sucursal"].'</td>

                  <td>'.$value["telefono_sucursal"].'</td>

                  <td>'.$value["estado"].'</td>

                  <td>'.$value["ciudad"].'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>

                    <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTalla"  data-toggle="modal" data-target="#modalEditarTalla"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarTalla" ><i class="fa fa-times"></i></button>

                      </div>  

                  </td>

                </tr>';
            }

          ?>

               
        </tbody>

       </table>



      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarScursal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Sucursal</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="nuevoCodigo" name="nuevoCodigo" placeholder="Codigo Sucursal" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-xs" name="nuevaDescripcion" placeholder="Nombre Sucursal" required>

              </div>

            </div>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="nuevaDireccion" name="nuevaDireccion" placeholder="Direccion sucursal">

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-xs" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

               <input type="text" class="form-control input-xs" id="nuevaCiudad" name="nuevaCiudad" placeholder="Ciudad" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-xs" name="nuevoEstado" placeholder="Estado" required>

              </div>

            </div>

             

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">Logotipo</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

      </form>

        <?php

          $crearSucursal = new ControladorSucursales();
          $crearSucursal -> ctrCrearSucursal();

        ?>  

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="editarId" name="editarId" readonly>

              </div>



            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="editarCodigo" name="editarCodigo" readonly>

              </div>

            </div>
                        <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

              <input type="text" class="form-control input-xs" id="editarTalla" name="editarTalla" readonly>

              </div>

            </div>


            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-xs" name="editarDescripcion" id="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-xs" name="editarStock" id="editarStock" min="0" title="Stock" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                    
                    <input type="text" class="form-control input-lg" id="editarPrecioInicio" name="editarPrecioInicio" step="any" min="0" title="Precio Inicio" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO MAYOREO -->

                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="text" class="form-control input-lg" id="editarPrecioMayoreo" name="editarPrecioMayoreo" step="any" min="0" title="Precio Mayoreo" required>

                  </div>
                </div>

                </div>
                 <!-- ENTRADA PARA PRECIO VENDEDORA -->

             <div class="form-group row">

                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="text" class="form-control input-lg" id="editarPrecioVendedora" name="editarPrecioVendedora" step="any" min="0" title="Precio Vendedora" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO PUBLICO -->

                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="text" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" title="Precio Publico" required>

                  </div>

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form> 

    </div>

  </div>

</div>


