<?php

require_once "conexion.php";

class ModeloMotivos{

	static public function mdlMostrarMotivos($tabla, $item, $valor){

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

	/*=============================================
	BUSCAR MOTIVOS
	=============================================*/

	static public function mdBuscarMotivos($tabla, $item3, $valor3){

		$stmt= Conexion::conectar()->prepare("SELECT * from $tabla WHERE nombre_motivo LIKE '$item3' order by nombre_motivo limit 0,5 ");
		$stmt->bindParam(":nombre_motivo", $valor3, PDO::PARAM_STR);
		// var_dump($stmt);
		if($stmt->execute()){
			return $stmt->fetchall();
		}else{
			return "error";
		}

		$stmt->close();
		$stmt=null;

	}
}
