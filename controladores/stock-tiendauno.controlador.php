<?php

class ControladorStockt1{


	static public function ctrMostrarPrductost1($item, $valor){

		$tabla= "tbl_stktienda1";

		$respuesta= ModeloStkTiendauno::mdlMostrarProductost1($tabla, $item, $valor);
		
		return $respuesta;
	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearStockt1(){

		if(isset($_POST["nombreZapato"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreZapato"]) &&	
			   preg_match('/^[0-9-.]+$/', $_POST["codigoZapato"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "vistas/img/productos/default/anonymous.png";



				$tabla = "tbl_stktienda1";

				$datos=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["220"],
							  "pares_stock" => $_POST["tallaVeintidos"],
							  );
			

				$respuesta = ModeloStkTiendauno::mdlIngresarstk($tabla, $datos);

				$tabla1 = "tbl_stktienda1";

					$datos1=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["225"],
							  "pares_stock" => $_POST["tallaVeintidosm"],
							  );

				
				$respuesta1 = ModeloStkTiendauno::mdlIngresarstk1($tabla1, $datos1);

				$tabla2 = "tbl_stktienda1";

					$datos2=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["230"],
							  "pares_stock" => $_POST["tallaVeintitres"],
							  );

				
				$respuesta2 = ModeloStkTiendauno::mdlIngresarstk2($tabla2, $datos2);

				$tabla3 = "tbl_stktienda1";

					$datos3=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["235"],
							  "pares_stock" => $_POST["tallaVeintitresm"],
							  );

				
				$respuesta3 = ModeloStkTiendauno::mdlIngresarstk3($tabla3, $datos3);

				$tabla4 = "tbl_stktienda1";

					$datos4=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["240"],
							  "pares_stock" => $_POST["tallaVeinticuatro"],
							  );

				
				$respuesta4 = ModeloStkTiendauno::mdlIngresarstk4($tabla4, $datos4);

				$tabla5 = "tbl_stktienda1";

					$datos5=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["245"],
							  "pares_stock" => $_POST["tallaVeinticuatrom"],
							  );

				
				$respuesta5 = ModeloStkTiendauno::mdlIngresarstk5($tabla5, $datos5);

				$tabla6 = "tbl_stktienda1";

					$datos6=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["250"],
							  "pares_stock" => $_POST["tallaVeinticinco"],
							  );

				
				$respuesta6 = ModeloStkTiendauno::mdlIngresarstk6($tabla6, $datos6);


				$tabla7 = "tbl_stktienda1";

				$datos7=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["255"],
							  "pares_stock" => $_POST["tallaVeinticincom"],
							  );
			

				$respuesta7 = ModeloStkTiendauno::mdlIngresarstk7($tabla7, $datos7);

				$tabla8 = "tbl_stktienda1";

					$datos8=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["260"],
							  "pares_stock" => $_POST["tallaVeintiseis"],
							  );

				
				$respuesta8 = ModeloStkTiendauno::mdlIngresarstk8($tabla8, $datos8);

				$tabla9 = "tbl_stktienda1";

					$datos9=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["265"],
							  "pares_stock" => $_POST["tallaVeintiseism"],
							  );

				
				$respuesta9 = ModeloStkTiendauno::mdlIngresarstk9($tabla9, $datos9);

				$tabla10 = "tbl_stktienda1";

					$datos10=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["270"],
							  "pares_stock" => $_POST["tallaVeintisiete"],
							  );

				
				$respuesta10 = ModeloStkTiendauno::mdlIngresarstk10($tabla10, $datos10);

				$tabla11 = "tbl_stktienda1";

					$datos11=array("codigo_stkzapato" => $_POST["codigoZapato"],
							  "nombre_zapato" => $_POST["nombreZapato"],
							  "precio_publico" => $_POST["precioVenta"],
							  "talla_zapato" => $_POST["275"],
							  "pares_stock" => $_POST["tallaVeintisietem"],
							  );
				$respuesta11 = ModeloStkTiendauno::mdlIngresarstk11($tabla11, $datos11);	
				
				if($respuesta11 == "ok"){
					echo'<script>

						swal({
							  type: "success",
							  title: "Stock asignado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "stktienda-uno";

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

							window.location = "zapatos";

							}
						})

			  	</script>';
			}
		}

	}
	 }