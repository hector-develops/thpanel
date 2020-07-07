<?php

class ControladorSucursales{

	static public function ctrMostrarSucursales($item, $valor){

		$tabla= "tbl_sucursales";
		$respuesta = ModeloSucursales::mdlMostrarSucursales($tabla, $item, $valor);

		return $respuesta;
		
	}
	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearSucursal(){

		if(isset($_POST["nuevaDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevaDescripcion"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevaDireccion"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "vistas/img/productos/default/anonymous.png";



				$tabla = "tbl_sucursales";

				$datos=array("codigo_sucursal" => $_POST["nuevoCodigo"],
							  "nombre_sucursal" => $_POST["nuevaDescripcion"],
							  "direccion_sucursal" => $_POST["nuevaDireccion"],
							  "telefono_sucursal" => $_POST["nuevoTelefono"],
							  "ciudad" => $_POST["nuevaCiudad"],
							  "estado" => $_POST["nuevoEstado"]
							  );

				$respuesta = ModeloSucursales::mdlIngresarSucursal($tabla, $datos);

				

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "Sucursal  guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "sucursal";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "sucursal";

							}
						})

			  	</script>';
			}
		}

	}
	 }