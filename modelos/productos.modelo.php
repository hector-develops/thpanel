<?php

require_once "conexion.php";

class ModeloProductosPV{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdCrearProductoPV($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_producto, nombre_producto, precio_compra, precio_venta, um_venta , um_compra, usuario_alta, fk_categoria, foto) 
            VALUES (:codigo_producto, :nombre_producto, :precio_compra, :precio_venta, :um_venta , :um_compra, :usuario_alta, :fk_categoria, :foto) ");

	

		$stmt->bindParam(":codigo_producto", $datos["codigo_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_INT);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":um_venta", $datos["um_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":um_compra", $datos["um_compra"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario_alta", $datos["usuario_alta"], PDO::PARAM_STR);
		$stmt->bindParam(":fk_categoria", $datos["fk_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }
	
	static public function mdlBorrarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");

		$stmt -> bindParam(":id_producto", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
    
	static public function mdMostrarProductoPV($item, $valor, $tabla){
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

	static public function mdMostrarProductoV($item, $valor, $tabla){
		if($item !=null){

			$stmt= Conexion::conectar()->prepare("select p.id_producto as id_producto, p.codigo_producto as codigo_producto, p.nombre_producto as nombre_producto, c.nombreCategoria as categoria,
			p.precio_venta as precio_venta, p.precio_compra as precio_compra, p.status_productos as status_productos, p.foto as foto
			from tbl_productos as p
			inner join tbl_categorias as c on p.fk_categoria = idCategoria");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();

			}else{
				
				$stmt=Conexion::conectar()->prepare("select p.id_producto as id_producto, p.codigo_producto as codigo_producto, p.nombre_producto as nombre_producto, c.nombreCategoria as categoria,
				p.precio_venta as precio_venta, p.precio_compra as precio_compra, p.status_productos as status_productos, p.foto as foto
				from tbl_productos as p
				inner join tbl_categorias as c on p.fk_categoria = idCategoria");
				$stmt->execute();
				return $stmt-> fetchAll();
			}

			$stmt->close();
			$stmt = null;
		
	}
	
	static public function mdValidarProductoPV($item, $valor, $tabla){
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

	public function ajaxGuardarImagen(){

		if (is_array($_FILES) && count($_FILES) > 0) {
			
			if (($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/gif")) {
				if (move_uploaded_file($_FILES["file"]["tmp_name"], "../vistas/img/modelos/".$_FILES['file']['name'])) {
					$respuesta = "vistas/img/modelos/".$_FILES['file']['name'];

					echo json_encode($respuesta);
				} else {
					echo 0;
				}
			} else {
				echo 0;
			}
		}else {
			echo 0;
		}
	}

	static public function mdEditarProductoPostPV($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE tbl_productos SET  nombre_producto = '".$datos['nombre_producto']."',  precio_compra = '".$datos['precio_compra']."', 
		 precio_venta = '".$datos['precio_venta']."',  foto = '".$datos['foto']."'  WHERE codigo_producto = '".$datos['codigo_producto']."'");
	
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function MdlUpdateStatusProductos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status_productos = '1' WHERE id_producto = :id_producto");

		$stmt -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		
		$stmt = null;

	}

	static public function MdlUpdateStatusProductos1($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status_productos = '0' WHERE id_producto = :id_producto");

		$stmt -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);



		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlMostrarCategorias($tabla, $datos){
		
				
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt-> fetchAll();
			

			$stmt->close();
			$stmt = null;
		
	}

	


}