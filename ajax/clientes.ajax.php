<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";



class AjaxClientes{

	public function ajaxAgregarCliente(){

		$datos = array(
			'nombre_cliente' => $_POST["nombre"] , 
			'telefono_cliente' => $_POST["telefono"] , 
			'direccion_cliente' => $_POST["direccion"] , 
			'tipo' => $_POST["tipo"] , 
		);

		// echo json_encode($datos);
		$respuesta = ControladorClientes::ctrAgregarCliente($datos);

		echo json_encode($respuesta);


	}
	
	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id_cliente";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

 } 
	

 if(isset($_POST["tipo"])){

	$cliente = new AjaxClientes();
	$cliente -> ajaxAgregarCliente();

}

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}

