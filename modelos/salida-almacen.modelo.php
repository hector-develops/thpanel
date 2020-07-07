
<?php


require_once "conexion.php";

class ModeloSalidaAlmacen{


/*=============================================
	BUSCAR MOTIVOS
	=============================================*/

	static public function mdBuscarClientes($tabla, $item3, $valor3){

		$stmt= Conexion::conectar()->prepare("SELECT * from $tabla WHERE nombre_cliente LIKE '$item3' AND tipo='1' order by nombre_cliente limit 0,5 ");
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
	static public function mdBuscarProductos1($tabla, $item3, $valor3){

		$stmt= Conexion::conectar()->prepare("SELECT * from $tabla WHERE nombre_producto LIKE '$item3' order by nombre_producto limit 0,5 ");
		$stmt->bindParam(":nombre_producto", $valor3, PDO::PARAM_STR);
		// var_dump($stmt);
		if($stmt->execute()){
			return $stmt->fetchall();
		}else{
			return "error";
		}

		$stmt->close();
		$stmt=null;

	}
	


    
    static public function mdBuscarProductos($tabla, $datos){

        if($datos != null){
    
          $stmt = Conexion::conectar()->prepare("SELECT P.id_producto, P.codigo_producto, P.nombre_producto, P.precio_venta,P.precio_compra,P.usuario_alta,P.ventas_producto,P.status_iva,P.status_productos,P.fecha_alta,M.existencias_producto  FROM tbl_productos P INNER JOIN tbl_maestraentalmacen M ON P.codigo_producto=M.fk_codigoproducto WHERE codigo_producto = :codigo_producto");
    
          $stmt->bindParam(":codigo_producto", $datos["codigo_producto"], PDO::PARAM_STR);
    
          $stmt -> execute();
    
		  return $stmt -> fetch();
		  
    
        }else{
    
          $stmt = Conexion::conectar()->prepare("SELECT P.id_producto, P.codigo_producto, P.nombre_producto, P.precio_venta,P.precio_compra,P.usuario_alta,P.ventas_producto,P.status_iva,P.status_productos,P.fecha_alta,M.existencias_producto  FROM tbl_productos P INNER JOIN tbl_maestraentalmacen M ON P.codigo_producto=M.fk_codigoproducto");
    
          $stmt -> execute();
    
          return $stmt -> fetchAll();
    
        }
	}

	static public function mdBuscarCajaDatos($tabla, $datos){

        if($datos != null){
    
          $stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE id_movimiento_caja = :id_movimiento_caja");
    
          $stmt->bindParam(":id_movimiento_caja", $datos["id_movimiento_caja"], PDO::PARAM_STR);
    
          $stmt -> execute();
    
		  return $stmt -> fetch();
		  
    
        }else{
    
          $stmt = Conexion::conectar()->prepare("SELECT * from $tabla");
    
          $stmt -> execute();
    
          return $stmt -> fetchAll();
    
        }
	}
	
	
	static public function mdBuscarAbono($tabla, $datos){

        if($datos != null){
    
          $stmt = Conexion::conectar()->prepare("SELECT SUM(abono) as TotalAbono from tbl_abonofiado WHERE fk_folio = :fk_folio");
    
          $stmt->bindParam(":fk_folio", $datos["fk_folio"], PDO::PARAM_STR);
    
          $stmt -> execute();
    
		  return $stmt -> fetch();
		  
    
        }else{
    
          $stmt = Conexion::conectar()->prepare("SELECT SUM(abono) as TotalAbono from tbl_abonofiado");
    
          $stmt -> execute();
    
          return $stmt -> fetchAll();
    
        }
    }
	  
    static public function mdlInserSalAlmacen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(folio_salalmacen,fk_cliente,total_productos,total_precioventa,fk_usuario,status,serie) VALUES 
		(:folio_salalmacen,:fk_cliente,:total_productos,:total_precioventa,:fk_usuario,:status,:serie)");
	
		$stmt->bindParam(":fk_cliente", $datos["fk_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":folio_salalmacen", $datos["folio_salalmacen"], PDO::PARAM_STR);
		$stmt->bindParam(":total_productos", $datos["total_productos"], PDO::PARAM_STR);
		$stmt->bindParam(":total_precioventa", $datos["total_precioventa"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_usuario", $datos["fk_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_INT);


		
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}
    static public function mdlInserAbono($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fk_folio,abono) VALUES 
		(:fk_folio,:abono)");
	
		$stmt->bindParam(":fk_folio", $datos["fk_folio"], PDO::PARAM_STR);
		$stmt->bindParam(":abono", $datos["abono"], PDO::PARAM_STR);
		

	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}

	static public function mdlUpdateAbono($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status='1' WHERE folio_salalmacen=:folio_salalmacen");
	
		$stmt->bindParam(":folio_salalmacen", $datos["folio_salalmacen"], PDO::PARAM_STR);
		
		

	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}

	static public function mdlUpdatecaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero_ventas=:numero_ventas,monto_final=:monto_final,total_caja=:total_caja  WHERE id_movimiento_caja=:id_movimiento_caja");
	
		$stmt->bindParam(":id_movimiento_caja", $datos["id_movimiento_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":numero_ventas", $datos["numero_ventas"], PDO::PARAM_INT);
		$stmt->bindParam(":monto_final", $datos["monto_final"], PDO::PARAM_STR);
		$stmt->bindParam(":total_caja", $datos["total_caja"], PDO::PARAM_STR);

	


		
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}
	static public function mdlUpdatecajacerra($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET total_caja=:total_caja, fecha_cierre_caja=:fecha_cierre_caja  WHERE id_movimiento_caja=:id_movimiento_caja");
	
		$stmt->bindParam(":id_movimiento_caja", $datos["id_movimiento_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":total_caja", $datos["total_caja"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_cierre_caja", $datos["fecha_cierre_caja"], PDO::PARAM_STR);

		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}
	static public function mdlUpdatestatus($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status_caja='0' WHERE id_caja_venta=:id_caja_venta");
	
		$stmt->bindParam(":id_caja_venta", $datos["id_caja_venta"], PDO::PARAM_INT);
		
	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}

	static public function mdlUpdatediferencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET diferencia_ventas=:diferencia_ventas WHERE id_movimiento_caja=:id_movimiento_caja");
	
		$stmt->bindParam(":id_movimiento_caja", $datos["id_movimiento_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":diferencia_ventas", $datos["diferencia_ventas"], PDO::PARAM_INT);

		
	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}

	
	
	static public function mdlMostrarFolioAlmacen($tabla, $item, $valor){

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
	
	static public function mdlMostrarSerieCaja($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT MAX(MC.id_movimiento_caja) as caja FROM tbl_mvtos_cajas MC INNER JOIN tbl_cajas C ON MC.fk_caja=C.id_caja_venta WHERE status_caja='1'");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT MAX(MC.id_movimiento_caja) as caja FROM tbl_mvtos_cajas MC INNER JOIN tbl_cajas C ON MC.fk_caja=C.id_caja_venta WHERE status_caja='1'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}

	
	static public function mdlMostrarSalidasAlmacen($item, $valor){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("SELECT SA.id_salalmacen, SA.folio_salalmacen, SA.fk_cliente, SA.total_productos, SA.total_precioventa, SA.fk_usuario,SA.fecha, SA.status, U.nombre,C.nombre_cliente FROM tbl_ventas SA INNER JOIN usuarios U ON SA.fk_usuario=U.id INNER JOIN tbl_clientes C ON C.id_cliente=SA.fk_cliente WHERE $item= :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			}else{
				
				$stmt=Conexion::conectar()->prepare("SELECT SA.id_salalmacen, SA.folio_salalmacen, SA.fk_cliente, SA.total_productos, SA.total_precioventa, SA.fk_usuario,SA.fecha, SA.status, U.nombre,C.nombre_cliente FROM tbl_ventas SA INNER JOIN usuarios U ON SA.fk_usuario=U.id INNER JOIN tbl_clientes C ON C.id_cliente=SA.fk_cliente");
				$stmt->execute();
				return $stmt-> fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}

	static public function mdlMostrarExistencias($item, $valor){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("SELECT P.codigo_producto,P.ventas_producto,P.nombre_producto,P.foto,P.status_productos,E.existencias_producto FROM tbl_productos P INNER JOIN tbl_maestraentalmacen E on P.codigo_producto=E.fk_codigoproducto WHERE $item= :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			}else{
				
				$stmt=Conexion::conectar()->prepare("SELECT P.codigo_producto,P.ventas_producto,P.nombre_producto,P.foto,P.status_productos,E.existencias_producto FROM tbl_productos P INNER JOIN tbl_maestraentalmacen E on P.codigo_producto=E.fk_codigoproducto");
				$stmt->execute();
				return $stmt-> fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}
	
	
}