<?php

class ControladorUnidadMedida{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrAgregarUnidadMedida($datos){

		$tabla = "tbl_unidad_medida";

		$respuesta = ModeloUnidadMedida::mdlIngresarUnidadMedida($tabla, $datos);

		return $respuesta;
	
    }
    

    static public function ctrMostrarUnidadMedida($item, $valor){

		$tabla = "tbl_unidad_medida";

		$respuesta = ModeloUnidadMedida::mdlMostarUnidadMedida($tabla, $item, $valor);

		return $respuesta;
	
    }
    
}
