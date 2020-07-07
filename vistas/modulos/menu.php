<aside class="main-sidebar"   style="background-color: #000000;">

	 <section class="sidebar">

		<ul class="sidebar-menu">
		
		<?php

		if($_SESSION['perfil']=="Administrador"){

			echo'

			
			<li class="treeview">

				<a href="#">

					<i class="fa fa-home"></i>
					
					<span>Inicio</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					<li>

						<a href="datos-empresa">
							
							<i class="fa fa-circle-o"></i>
							<span>Datos Empresa</span>

						</a>

					</li>
					<li>

						<a href="sucursales">
							
							<i class="fa fa-circle-o"></i>
							<span>Sucursales</span>

						</a>

					</li>


				</ul>

			</li>
			
			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>'
			
			;
		}
		if($_SESSION['perfil']=="Administrador" || $_SESSION['perfil']=="Especial"){
			echo '
			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Productos</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					<li>

						<a href="productos">
							
							<i class="fa fa-circle-o"></i>
							<span>Productos</span>

						</a>

					</li>


				</ul>

			</li>
			<li class="treeview">

			<a href="#">

				<i class="fa fa-tasks"></i>
				
				<span>Conceptos</span>
				
				<span class="pull-right-container">
				
					<i class="fa fa-angle-left pull-right"></i>

				</span>

			</a>

			<ul class="treeview-menu">
				<li>

					<a href="unidades-medidas">
						
						<i class="fa fa-circle-o"></i>
						<span>Unidades De Medida</span>

					</a>

				</li>
				
				<li>

					<a href="equivalencias">
						
						<i class="fa fa-circle-o"></i>
						<span>Equivalencias</span>

					</a>

				</li>
				
			</ul>


		</li>';
		}
		if($_SESSION['perfil']=="Administrador" || $_SESSION['perfil']=="Vendedor"){
			
			echo'
			<li class="treeview">

			<a href="#">

				<i class="fa fa-user-o "></i>
				
				<span>Clientes</span>
				
				<span class="pull-right-container">
				
					<i class="fa fa-angle-left pull-right"></i>

				</span>

			</a>

			<ul class="treeview-menu">
			
			<li>

				<a href="clientes">

					<i class="fa fa-circle-o"></i>
					<span>Clientes</span>

				</a>

			</li>

			</ul>


			<li class="treeview">

			<a href="#">

				<i class="fa fa-archive"></i>
				
				<span>Modulos</span>
				
				<span class="pull-right-container">
				
					<i class="fa fa-angle-left pull-right"></i>

				</span>

			</a>

			<ul class="treeview-menu">

				
			</ul>


		</li>';
		}
					
					?>

				</ul>

			</li>
				
		

		</ul>

	 </section>

</aside>