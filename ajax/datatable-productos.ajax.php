<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class DatatableProductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarDatatableProductos(){

		$item = null;
    	$valor = null;

		$prodoctos = ControladorProductosPV::ctrMostrarProductosV($item, $valor);
		// var_dump($prodoctos);

  		if(count($prodoctos) == 0){

  			echo '{"data": []}';

		  	return;
  		}	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($prodoctos); $i++){

		  	
			$botones= "<div class='btn-group'><button class='btn btn-warning ' onclick='editarProductoGet(".$prodoctos[$i]["codigo_producto"].");' data-toggle='modal'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnBorrarProducto' idEliminaP='(".$prodoctos[$i]["id_producto"].");' fotoProducto='(".$prodoctos[$i]["foto"].");'><i class='fa fa-times'></i></button></div>";
			$img2= "<img src='".$prodoctos[$i]["foto"]."' class='img-thumbnail' width='80px'>";

			if($prodoctos[$i]["status_productos"] == 1){

				$status= "<center><button class='btn btn-success btn-xs btnStatuaProductos' codigoProducto='".$prodoctos[$i]["id_producto"]."' statusProducto='".$prodoctos[$i]["status_productos"]."'>Si</button></center>";   

			 }else if($prodoctos[$i]["status_productos"] == 0){

			$status= "<center><button class='btn btn-danger btn-xs btnStatuaProductos'codigoProducto='".$prodoctos[$i]["id_producto"]."' statusProducto='".$prodoctos[$i]["status_productos"]."'>No</button></center>";
			 }



		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$prodoctos[$i]["codigo_producto"].'",
				  "'.$prodoctos[$i]["nombre_producto"].'",
				  "'.$prodoctos[$i]["categoria"].'",
			      "$ '.$prodoctos[$i]["precio_compra"].'",
			      "$ '.$prodoctos[$i]["precio_venta"].'",
			      "'.$status.'",
				  "'.$img2.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;



	}

		


}


/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new DatatableProductos();
$activarProductos -> mostrarDatatableProductos();



