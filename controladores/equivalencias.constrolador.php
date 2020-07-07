<?php

class ControladorEquivalencias{


	/*=============================================
	MOSTRAR Equivalencias
	=============================================*/
	static public function ctrMostrarEquivalencias($valor, $item){

		$tabla = "tbl_equivalencia";

        $respuesta = ModeloEquivalencias::mdlMostrarEquivalencias($tabla, $valor, $item);

		return $respuesta;

	}

	/*=============================================
	CREAR Euivalencia
	=============================================*/

	static public function ctrCrearEquivalencias($datos){

		$tabla = "tbl_equivalencia";

		$respuesta = ModeloEquivalencias::mdlCrearEquivalencias($tabla, $datos);

		return $respuesta;
	
	}

    static public function ctrValidarEquivalencia($item, $valor){

		$tabla = "tbl_equivalencia";

		$respuesta = ModeloEquivalencias::mdValidarEquivalencia($item, $valor, $tabla);

		return $respuesta;

	}

}
