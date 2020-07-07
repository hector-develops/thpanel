<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Datos Empresa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
      <li><a href="#">Datos Empresa</a></li>
    </ol>
  </section>

  <section class="content">
    <?php

    $item = null;
    $valor = null;

    $empresa = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);
    for ($i = 0; $i < count($empresa); $i++) {

      ?>

      <div class="row">
        <div class="col-md-3">

          <!-- PERFIL EMPRESA -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="img-responsive" src="<?php echo  $empresa[$i]["logo"]; ?>" alt="Logotipo">
              <h3 class="profile-username text-center"> <i><?php echo  $empresa[$i]["razon_social"]; ?> <i> </h3>
              <p class="text-muted text-center"><?php echo  $empresa[$i]["descripcion"]; ?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nombre</b> <a class="pull-right"><?php echo  $empresa[$i]["razon_social"]; ?></a>
                </li>
                <li class="list-group-item">
                  <b>RFC</b> <a class="pull-right"><?php echo  $empresa[$i]["rfc_empresa"]; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Correo</b> <a class="pull-right"><?php echo  $empresa[$i]["correo"]; ?></a>
                </li>
              </ul>
              <a href="#settings" data-toggle="tab" aria-expanded="true" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
          </div>



          <!-- MAS DETALLEs -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Mas detalles </h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i>Ubicacion</strong>

              <p class="text-muted"><?php echo  $empresa[$i]["direccion"]; ?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">Productos</span>
                <span class="label label-success">Ventas</span>
                <span class="label label-info">Stock</span>
                <span class="label label-warning">Usuarios</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>1.- </p>
              <p>2.- </p>
              <p>3.- </p>
            </div>
          </div>
        </div>

        <!-- CONFIGURACION -->

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true">Imagenes</a></li>
              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Configuracion</a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="timeline">
                <ul class="timeline timeline-inverse">
                  <!-- Logo  1-->

                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Logo Principal </a></h3>

                      <div class="timeline-body">
                        <img src="<?php echo  $empresa[$i]["logo"]; ?>" alt="..." class="margin" style="max-width: 200px;">
                      </div>
                    </div>
                  </li>

                  <!-- ICONO -->
                  <li>
                    <i class="fa fa-camera bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Icono </a></h3>

                      <div class="timeline-body">
                        <img src="<?php echo  $empresa[$i]["icono"];
                                  } ?>" alt="..." class="margin" style="max-width: 100px;">
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- CAMBIAR CONFIGURACION -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">RFC</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputRFC" placeholder="RFC">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Direccion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputDirecion" placeholder="Direccion">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Descripción</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputDescripcion" placeholder="Descripción"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Teléfono</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Celular</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputCelular" placeholder="numero celular">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputCorreo" placeholder="Correo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Facebook</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputFacebook" placeholder="url facebook">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Instagram</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputInstagram" placeholder="url instagram">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Titulo Inicio</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputIniciot" placeholder="titulo inicio">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Logo</label> 
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="idLogoEmpresa1" readonly placeholder="imagen/.../...">
                    </div>
                    <div class="col-sm-2">
                      <label class="btn btn-primary">
                      <input id="fotoEmpresa1" type="file" style="display:none" onchange="subirImagenEmpresa(1); $('#idLogoEmpresa1').val( 'vistas/img/plantilla/' + this.files[0].name); "> Selecionar Imagen </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Icono</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="iconoEmpresa" readonly placeholder="imagen/.../...">
                    </div>
                    <div class="col-sm-2">
                      <label class="btn btn-primary">
                      <input id="fotoEmpresa2" type="file" style="display:none" onchange="subirImagenEmpresa(2); $('#iconoEmpresa').val('vistas/img/plantilla/'+ this.files[0].name); "> Selecionar Imagen </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-danger" onclick="updateDatosEmpresa();">Actualizar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

  </section>