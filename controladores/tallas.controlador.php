<?php

class ControladorTallas{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearTalla(){

		if(isset($_POST["nuevaTalla"])){

			if(preg_match('/^[0-9-. ]+$/', $_POST["nuevaTalla"])){

				$tabla = "tbl_tallas";

				$datos = $_POST["nuevaTalla"];

				$respuesta = ModeloTallas::mdlIngresarTalla($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La talla ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tallas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

	}

	

	static public function ctrMostrarTallas($item, $valor){

		$tabla = "tbl_tallas";

		$respuesta = ModeloTallas::mdlMostrarTallas($tabla, $item, $valor);

		return $respuesta;
	
	}
}
