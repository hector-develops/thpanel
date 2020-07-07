
<?php

require_once "conexion.php";

class ModeloEntradaAlmacen{


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
    static public function mdBuscarPro($tabla, $item3, $valor3){

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
    
          $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_producto = :codigo_producto");
    
          $stmt->bindParam(":codigo_producto", $datos["codigo_producto"], PDO::PARAM_STR);
    
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
    
  static public function mdlInserEntAlmacen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(folio_entalmacen,fk_motivo,total_productos,total_costo,fk_usuario) VALUES 
		(:folio_entalmacen,:fk_motivo,:total_productos,:total_costo,:fk_usuario)");
	
		$stmt->bindParam(":folio_entalmacen", $datos["folio_entalmacen"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_motivo", $datos["fk_motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":total_productos", $datos["total_productos"], PDO::PARAM_STR);
		$stmt->bindParam(":total_costo", $datos["total_costo"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_usuario", $datos["fk_usuario"], PDO::PARAM_STR);
	

	
		if($stmt->execute()){
	
			return "ok";
	
		}else{
	
			return "error";
		
		}
	
		$stmt->close();
		$stmt = null;
	
	}
  
	static public function mdlMostrarEntradasAlmacen($item, $valor){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("SELECT U.nombre, M.nombre_motivo,EA.id_entalmacen,EA.folio_entalmacen,EA.fk_motivo,EA.total_productos, EA.total_costo,EA.fk_usuario,EA.fecha  FROM tbl_entradaalmacen EA INNER JOIN tbl_motivos M ON EA.fk_motivo=M.id_motivo INNER JOIN usuarios U ON EA.fk_usuario=U.id WHERE $item= :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			}else{
				
				$stmt=Conexion::conectar()->prepare("SELECT U.nombre, M.nombre_motivo,EA.id_entalmacen,EA.folio_entalmacen,EA.fk_motivo,EA.total_productos, EA.total_costo,EA.fk_usuario,EA.fecha  FROM tbl_entradaalmacen EA INNER JOIN tbl_motivos M ON EA.fk_motivo=M.id_motivo INNER JOIN usuarios U ON EA.fk_usuario=U.id");
				$stmt->execute();
				return $stmt-> fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}
}