<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Unidades de Medida
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Unidad De Medida</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUnidadM">
          
          Agregar 

        </button>

      </div>

      <div class="box-body">
        
       <table id="tablaUnidadMedida" class="table table-bordered table-striped dt-responsive tablaUnidadMedida">
         
        <thead>
         
         <tr>
           
            <th style="width:10px">#</th>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Abreviacion</th>
            <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
          <?php

          $item = null;
          $valor = null;
          $unidadMed = ControladorUnidadMedida::ctrMostrarUnidadMedida($item, $valor);
          foreach ($unidadMed as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["codigo"].'</td>
                    <td class="text-uppercase">'.$value["descripcion"].'</td>
                    <td class="text-uppercase">'.$value["abreviacion"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTalla" idUnidadMedida="'.$value["id_unidad_medida"].'" data-toggle="modal" data-target="#modalEditarTalla"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarTalla" idUnidadMedida="'.$value["id_unidad_medida"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUnidadM" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Unidad de Medida</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->
            <div class="form-group">
            <label for="">CODIGO</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-xs" id="codUnidadMed" placeholder="Codigo" >

              </div>

            </div>
           <!-- ENTRADA PARA EL ABREVIACION -->
            
            <div class="form-group">
            <label for="">DESCRIPCION</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-terminal"></i></span> 

                <input type="text" class="form-control input-xs" id="nuevaDesUnidadMed" placeholder="Descripcion" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL ABREVIACION -->
            
            <div class="form-group">
            <label for="">ABREVIACION</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-sort-alpha-asc"></i></span> 

                <input type="text" class="form-control input-xs" id="nuevaAbreviacion" placeholder="Abreviacion" required>

              </div>

            </div>
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary " onclick="agragarUnidadMedida();">Guardar</button>

        </div>

      </form>
    </div>

  </div>

</div>
