<?php

require_once "conexion.php";

class ModeloTallas{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarTalla($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeracion_talla) VALUES (:numeracion_talla)");

		$stmt->bindParam(":numeracion_talla", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	MOSTRAR tallas
	=============================================*/

	static public function mdlMostrarTallas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


}

