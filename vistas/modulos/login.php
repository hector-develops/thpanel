
    <div class="right">
      <div class="content">
        <!-- <h2>Inicia Seccion</h2> -->
        

        <div class="login-box"  >
      <div > 
      <?php

        $item = null; $valor = null;
        $empresa = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);
        for ($i=0; $i < count($empresa); $i++) { 
        
      ?>
      <img src="<?php  echo  $empresa[$i]["logo"] ;} ?>" class="img-responsive" ><br>

        <p class="login-box-msg " style="color: white" >Inicio de Sesion</p><br>

        <form method="post">

          <div class="form-group has-feedback">

            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required style="border-radius: 10px">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

          </div>

          <div class="form-group has-feedback">

            <input type="password" class="form-control" placeholder="Password" name="ingPassword" required style="border-radius: 10px">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          
          </div> <br>

          <div class="row">
          
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block"style="border-radius: 10px">   Ingresar</button>
            
            </div><br><p></p>

          </div>

          <?php

            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();
            
          ?>

        </form>

      </div>

    </div>


      </div>
    </div>
  </div>
</div>


