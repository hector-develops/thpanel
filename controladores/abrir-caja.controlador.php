<?php

class ControladorcajaVenta{

	/*=============================================
	CREAR CLIENTES
	=============================================*/
	static public function ctrMostrarStatusCaja($item, $valor){

		$tabla = "tbl_cajas";

		$respuesta = ModeloabrirCaja::mdlBuscarCajastatus($tabla, $item, $valor);

		return $respuesta;
	}
	

}

