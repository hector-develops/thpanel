


<?php


require_once "conexion.php";

class ModeloRetiros{


/*=============================================
	BUSCAR MOTIVOS
	=============================================*/

	static public function mdBuscarMotivos($tabla, $item3, $valor3){

		$stmt= Conexion::conectar()->prepare("SELECT * from $tabla WHERE nombre_motivo LIKE '$item3'  order by nombre_motivo limit 0,5 ");
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
    static public function mdBuscarProveedor($tabla, $item3, $valor3){

		$stmt= Conexion::conectar()->prepare("SELECT * from $tabla WHERE nombre_cliente LIKE '$item3'  order by nombre_cliente limit 0,5 ");
		$stmt->bindParam(":nombre_cliente", $valor3, PDO::PARAM_STR);
		// var_dump($stmt);
		if($stmt->execute()){
			return $stmt->fetchall();
		}else{
			return "error";
		}

		$stmt->close();
		$stmt=null;

    }

    static public function mdBuscarCajero($tabla, $item3, $valor3){

		$stmt= Conexion::conectar()->prepare("SELECT * from $tabla WHERE nombre LIKE '$item3' AND perfil='Cajero' order by nombre limit 0,5 ");
		$stmt->bindParam(":nombre", $valor3, PDO::PARAM_STR);
		// var_dump($stmt);
		if($stmt->execute()){
			return $stmt->fetchall();
		}else{
			return "error";
		}

		$stmt->close();
		$stmt=null;

    }

        
    static public function mdBuscarCajaTotal($tabla, $datos){

        if($datos != null){
    
          $stmt = Conexion::conectar()->prepare("SELECT MC.total_caja, C.serie_caja FROM tbl_mvtos_cajas MC INNER JOIN  tbl_cajas C ON MC.fk_caja=C.id_caja_venta WHERE id_movimiento_caja = :id_movimiento_caja AND C.status_caja='1' ");
    
          $stmt->bindParam(":id_movimiento_caja", $datos["id_movimiento_caja"], PDO::PARAM_INT);
    
          $stmt -> execute();
    
		  return $stmt -> fetch();
		  
    
        }else{
    
          $stmt = Conexion::conectar()->prepare("SELECT MC.total_caja, C.serie_caja FROM tbl_mvtos_cajas MC INNER JOIN  tbl_cajas C ON MC.fk_caja=C.id_caja_venta");    
          $stmt -> execute();
    
          return $stmt -> fetchAll();
    
        }
	}
	static public function mdlInsertarretiros($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fk_motivo,fk_usuario,monto_retiro,fk_caja,fk_aperturacaja,cajero_proveedor) VALUES 
		(:fk_motivo,:fk_usuario,:monto_retiro,:fk_caja,:fk_aperturacaja,:cajero_proveedor)");
	
		$stmt->bindParam(":fk_motivo", $datos["fk_motivo"], PDO::PARAM_INT);
		$stmt->bindParam(":fk_usuario", $datos["fk_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":monto_retiro", $datos["monto_retiro"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_caja", $datos["fk_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":fk_aperturacaja", $datos["fk_aperturacaja"], PDO::PARAM_INT);
		$stmt->bindParam(":cajero_proveedor", $datos["cajero_proveedor"], PDO::PARAM_STR);
		


		
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}

	static public function mdlUpdateretiros($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET total_caja=:total_caja WHERE id_movimiento_caja=:id_movimiento_caja");
	
		$stmt->bindParam(":total_caja", $datos["total_caja"], PDO::PARAM_STR);
		$stmt->bindParam(":id_movimiento_caja", $datos["id_movimiento_caja"], PDO::PARAM_STR);

		
		

	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}

	
    
}


