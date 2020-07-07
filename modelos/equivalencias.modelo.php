<?php

require_once "conexion.php";

class ModeloEquivalencias{

	static public function mdlMostrarEquivalencias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT t1.id_equivalencia, t1.descripcion, t2.descripcion AS unidad_medida, t1.cantidad FROM tbl_equivalencia  t1
            INNER JOIN tbl_unidad_medida t2 ON t1.unidad_medida = t2.id_unidad_medida");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR EQUIVALENCIA
	=============================================*/

	static public function mdlCrearEquivalencias($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla  (codigo, descripcion, unidad_medida, cantidad) VALUES (:codigo, :descripcion, :unidad_medida, :cantidad) ");
// var_dump( $datos["codigo"]);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":unidad_medida", $datos["unidad_medida"], PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";
        
        }

        $stmt->close();
        $stmt = null;
	}


	/*=============================================
	VALIDAR EQUIVALENCIA
	=============================================*/
		
	static public function mdValidarEquivalencia($item, $valor, $tabla){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();

			}else{
				
				$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor'");

				
				$stmt->execute();
				return $stmt-> fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}
}
