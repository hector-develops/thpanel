<?php

require_once "conexion.php";

class ModeloEmpresa{

	/*=============================================
	MOSTRAR Empresa
	=============================================*/

	static public function mdlMostrarEmpresas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			// var_dump($stmt);
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();
			// var_dump($stmt);

			return $stmt -> fetchAll();

			

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdEditarEmpresa($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("UPDATE tbl_datos_empresa  SET razon_social = '".$datos['razon_social']."', rfc_empresa = '".$datos['rfc_empresa']."', telefono = '".$datos['telefono']."',
		correo = '".$datos['correo']."', direccion = '".$datos['direccion']."', celular_empresa = '".$datos['celular_empresa']."', facebook_empresa = '".$datos['facebook_empresa']."', instagram_empresa = '".$datos['instagram_empresa']."', titulo_inicio = '".$datos['titulo_inicio']."',
		descripcion = '".$datos['descripcion']."', logo = '".$datos['logo']."' , icono = '".$datos['icono']."' WHERE id_empresa = '1'");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


}