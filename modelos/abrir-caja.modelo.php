<?php

require_once "conexion.php";

class ModeloabrirCaja{

	/*=============================================
	MOSTRAR BOTTON ABRIR CAJA
	=============================================*/

	static public function mdlBuscarCajastatus($tabla, $item, $valor){

        if($item != null){
		$stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE serie_caja=:serie_caja AND status_caja=0");

        $stmt->bindParam(":serie_caja", $valor, PDO::PARAM_STR);
        $stmt->execute();      
		return $stmt -> fetch();

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	VERIFICAR CLAVE ACTIVAR CAJA
	=============================================*/

	static public function mdlVerificaClave($tabla, $datos){

		
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_caja_venta=:id_caja_venta and clave_caja=:clave_caja");

		$stmt->bindParam(":id_caja_venta", $datos["id_caja_venta"], PDO::PARAM_STR);
		$stmt->bindParam(":clave_caja", $datos["clave_caja"], PDO::PARAM_STR);

		if($stmt->execute()){

			return $stmt -> fetch();

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}

	/*=============================================
	INSERT UNO PARA ABRIR CAJA
	=============================================*/

	static public function mdlInsertAbrirCaja($tabla1, $datos1){

		
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(fk_caja,fk_serie_caja,fk_usuario,monto_inicial) VALUES 
		(:fk_caja,:fk_serie_caja,:fk_usuario,:monto_inicial)");
	
		$stmt->bindParam(":fk_caja", $datos1["fk_caja"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_serie_caja", $datos1["fk_serie_caja"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_usuario", $datos1["fk_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":monto_inicial", $datos1["monto_inicial"], PDO::PARAM_STR);
		
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR STATUS DE CAJA
	=============================================*/

	static public function mdlUpdateStCaja($tabla2, $datos2){

		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET status_caja =:status_caja WHERE id_caja_venta=:id_caja_venta AND serie_caja=:serie_caja");

		$stmt->bindParam(":id_caja_venta", $datos2["id_caja_venta"], PDO::PARAM_STR);
		$stmt->bindParam(":serie_caja", $datos2["serie_caja"], PDO::PARAM_STR);
		$stmt->bindParam(":status_caja", $datos2["status_caja"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}

}