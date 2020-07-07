
<?php


require_once "conexion.php";

class ModeloPromociones{

    static public function mdlInsertDocPromociones($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(name_promocion,code_promocion,fk_user_alta,cantidad_productos,total_productos,precio_promocion,fecha_inicio,fecha_final) VALUES 
		(:name_promocion,:code_promocion,:fk_user_alta,:cantidad_productos,:total_productos,:precio_promocion,:fecha_inicio,:fecha_final)");
	
		$stmt->bindParam(":name_promocion", $datos["name_promocion"], PDO::PARAM_STR);
		$stmt->bindParam(":code_promocion", $datos["code_promocion"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_user_alta", $datos["fk_user_alta"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_productos", $datos["cantidad_productos"], PDO::PARAM_INT);
		$stmt->bindParam(":total_productos", $datos["total_productos"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_promocion", $datos["precio_promocion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_final", $datos["fecha_final"], PDO::PARAM_STR);

	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}
	
    static public function mdldeletepro($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_det_promocion=:id_det_promocion");
	
		$stmt->bindParam(":id_det_promocion", $datos["id_det_promocion"], PDO::PARAM_STR);
		
	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}

	
    static public function mdlMostrarCodigoPromociones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

    }
    
    static public function mdlMostrarPromociones($item, $valor){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("SELECT P.id_promocion,P.name_promocion, P.code_promocion,P.cantidad_productos,P.total_productos,P.precio_promocion,P.fecha_inicio,P.fecha_final,P.status_promocion,P.ventas_promocion,P.fecha_registro, U.nombre  FROM tbl_promociones P INNER JOIN usuarios U ON P.fk_user_alta=U.id WHERE $item= :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			}else{
				
				$stmt=Conexion::conectar()->prepare("SELECT P.id_promocion,P.name_promocion, P.code_promocion,P.cantidad_productos,P.total_productos,P.precio_promocion,P.fecha_inicio,P.fecha_final,P.status_promocion,P.ventas_promocion,P.fecha_registro,U.nombre  FROM tbl_promociones P INNER JOIN usuarios U ON P.fk_user_alta=U.id");
				$stmt->execute();
				return $stmt-> fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}


	static public function ctrMostrarDetallePromocion($item, $valor){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("SELECT PRO.id_det_promocion,PRO.fk_code_promocion, PRO.cant_prod, PRO.precio_venta,PRO.total_costo, P.nombre_producto  FROM tbl_prodprmocion PRO INNER JOIN tbl_productos P ON PRO.fk_code_producto=P.codigo_producto WHERE $item= :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}
}
