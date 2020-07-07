<?php

require_once "../controladores/unidad-medida.controlador.php";
require_once "../modelos/unidad-medida.modelo.php";

class AjaxUnidadMedida{

	/*=============================================
	MOSTRAR UNIDAD DE MEDIDA
	=============================================*/	
	public function ajaxMostrarUnidadMedida(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}
    
	/*=============================================
	AGREGAR NUEVA UNIDAD DE MEDIDA
	=============================================*/	
	public function ajaxaAgregarUnidadMedida(){
        
        $datos = array(
			"codigo"=>$_POST["codigoUnidadMedida"],
			"descripcion"=>$_POST["descripcion"],
		    "abreviacion"=>$_POST["abreviacion"]
		);

		$respuesta = ControladorUnidadMedida::ctrAgregarUnidadMedida($datos);
        echo json_encode($respuesta);
	}
}

/*=============================================
AGREGAR UNIDAD DE MEDIDA
=============================================*/

if (isset($_POST["codigoUnidadMedida"])) {

	$search = new AjaxUnidadMedida();
    $search->ajaxaAgregarUnidadMedida();
    
}

