<?php

require_once "conexion.php";

class ModeloStkTiendauno{

	static public function mdlMostrarProductost1($tabla, $item, $valor){
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
	

static public function mdlIngresarstk($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlIngresarstk1($tabla1, $datos1){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos1["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos1["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos1["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos1["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos1["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk2($tabla2, $datos2){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos2["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos2["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos2["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos2["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos2["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk3($tabla3, $datos3){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla3(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos3["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos3["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos3["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos3["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos3["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk4($tabla4, $datos4){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla4(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos4["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos4["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos4["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos4["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos4["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk5($tabla5, $datos5){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla5(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos5["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos5["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos5["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos5["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos5["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk6($tabla6, $datos6){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla6(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos6["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos6["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos6["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos6["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos6["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}		

	static public function mdlIngresarstk7($tabla7, $datos7){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla7(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos7["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos7["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos7["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos7["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos7["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk8($tabla8, $datos8){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla8(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos8["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos8["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos8["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos8["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos8["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlIngresarstk9($tabla9, $datos9){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla9(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos9["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos9["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos9["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos9["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos9["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk10($tabla10, $datos10){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla10(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos10["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos10["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos10["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos10["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos10["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	static public function mdlIngresarstk11($tabla11, $datos11){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla11(codigo_stkzapato, nombre_zapato, precio_publico, talla_zapato, pares_stock) VALUES (:codigo_stkzapato, :nombre_zapato, :precio_publico, :talla_zapato, :pares_stock)");

		$stmt->bindParam(":codigo_stkzapato", $datos11["codigo_stkzapato"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_zapato", $datos11["nombre_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_publico", $datos11["precio_publico"], PDO::PARAM_STR);
		$stmt->bindParam(":talla_zapato", $datos11["talla_zapato"], PDO::PARAM_STR);
		$stmt->bindParam(":pares_stock", $datos11["pares_stock"], PDO::PARAM_STR);
	    

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR PRODUCTOS VENTAS
	=============================================*/

	static public function mdlActualizarZapato($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id_stkzapato = :id_stkzapato");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id_stkzapato", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}		
 }