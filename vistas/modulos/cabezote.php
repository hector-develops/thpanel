 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->

	<?php

		$item = null; $valor = null;
		$empresa = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);
		for ($i=0; $i < count($empresa); $i++) { 

	?>
	<a href="inicio" class="logo style="style="background: #000000 " >
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="<?php  echo  $empresa[$i]["icono"] ;?>" class="img-responsive" style="padding:10px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			<img src="<?php  echo  $empresa[$i]["logo"] ;} ?>" style="max-width: 90%;" class="img-responsive" style="padding:10px 0px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation" style="background: #667db6; background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); ">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
						
						<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>