<?php

require_once "../controladores/empresa.controlador.php";
require_once "../modelos/empresa.modelos.php";



class AjaxEmpresas{

	public function ajaxEditarEmpresa(){

		$datos = array(
			'razon_social' => $_POST["razon_social"] , 
			'rfc_empresa' => $_POST["rfc_empresa"] , 
			'telefono' => $_POST["telefono"] , 
			'descripcion' => $_POST["descripcion"] , 
			'correo' => $_POST["correo"] , 
			'direccion' => $_POST["direccion"] ,
			'titulo_inicio' => $_POST["titulo_inicio"] , 
			'celular_empresa' => $_POST["celular_empresa"] , 
			'facebook_empresa' => $_POST["facebook_empresa"] , 
			'instagram_empresa' => $_POST["instagram_empresa"] ,
			'logo' => $_POST["logo"] , 
			'icono' => $_POST["icono"] 
		);
		

		echo json_encode($datos);
		$respuesta = ControladorEmpresas::ctrEditarEmpresas($datos);

		echo json_encode($respuesta);


	}
	 
	public function ajaxActualizarLogotipo(){

		if (is_array($_FILES) && count($_FILES) > 0) {
			
			if (($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/gif")) {
            
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "../vistas/img/plantilla/".$_FILES['file']['name'])) {
                    
                    
                    $respuesta = "vistas/img/plantilla".$_FILES['file']['name'];

                    echo json_encode($respuesta);
                    

				} else {
					echo "error 1";
				}
			} else {
				echo "error 2 ";
			}
		}else {
			echo "error 3";
		}
	}

	public function ajaxMostrarEmpresas(){
        $item = null;
        $valor = null;
        $empresa = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);
        echo json_encode($empresa[0]);
	}	
	
} 
	

if(isset($_POST["razon_social"])){

	$Empresa = new AjaxEmpresas();
	$Empresa -> idEmpresa = $_POST["razon_social"];
	$Empresa -> ajaxEditarEmpresa();

}

if(isset($_FILES["file"]["type"])){

  $validar = new AjaxEmpresas();
  $validar -> ajaxActualizarLogotipo();

}

if(isset($_POST["id_empresa"])){

	$Empresa = new AjaxEmpresas();
	$Empresa -> ajaxMostrarEmpresas();

}