<?php

require_once "conexion.php";

class ModeloSucursales{
	static public function mdlMostrarSucursales($tabla, $item, $valor){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			}else{
				
				$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt->execute();
				return $stmt-> fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}

static public function mdlIngresarSucursal($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_sucursal, nombre_sucursal, direccion_sucursal, telefono_sucursal, ciudad, estado) VALUES (:codigo_sucursal, :nombre_sucursal, :direccion_sucursal, :telefono_sucursal, :ciudad, :estado)");

		$stmt->bindParam(":codigo_sucursal", $datos["codigo_sucursal"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_sucursal", $datos["nombre_sucursal"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion_sucursal", $datos["direccion_sucursal"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_sucursal", $datos["telefono_sucursal"], PDO::PARAM_STR);
	    $stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}	
 }