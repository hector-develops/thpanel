<?php

class ControladorProductosPV{


    static public function ctrCrearProductosPV($datos){

		$tabla = "tbl_productos";

		$respuesta = ModeloProductosPV::mdCrearProductoPV($tabla, $datos);

		return $respuesta;

    }
    
    static public function ctrMostrarProductosPV($item, $valor){

		$tabla = "tbl_productos";

		$respuesta = ModeloProductosPV::mdMostrarProductoPV($item, $valor, $tabla);

		return $respuesta;

	}
//Vista del datatable
	static public function ctrMostrarProductosV($item, $valor){

		$tabla = "tbl_productos";

		$respuesta = ModeloProductosPV::mdMostrarProductoV($item, $valor, $tabla);

		return $respuesta;

	}

    static public function ctrValidarProductosPV($item, $valor){

		$tabla = "tbl_productos";

		$respuesta = ModeloProductosPV::mdValidarProductoPV($item, $valor, $tabla);

		return $respuesta;

	}

    static public function ctrEditarProductosPostPV($datos){

		$tabla = "tbl_productos";

		$respuesta = ModeloProductosPV::mdEditarProductoPostPV($tabla, $datos);

		return $respuesta;

	}

	static public function ctrBorrarProductosPostPV($datos){

		var_dump($datos);

		if(isset($_GET["eliminacionP"])){

			$tabla ="tbl_productos";
			$datos = $_GET["eliminacionP"];

			if($_GET["fotoProductoD"] != ""){

				unlink($_GET["fotoProductoD"]);
				rmdir('vistas/img/productos/'.$_GET["fotoProductoD"]);

			}

			$respuesta = ModeloProductosPV::mdlBorrarProducto($tabla, $datos);

			

		}

	}
	
	static public function crtUpdateStatusProductos($datos){
		$tabla = "tbl_productos";

		$respuesta = ModeloProductosPV::MdlUpdateStatusProductos($tabla, $datos);

		return $respuesta;
	}

	static public function crtUpdateStatusMProductos1($datos){
		$tabla = "tbl_productos";

		$respuesta = ModeloProductosPV::MdlUpdateStatusProductos1($tabla, $datos);

		return $respuesta;
	}

	static public function crtMostrarCategorias($datos){

		$tabla = "tbl_categorias";

		$respuesta = ModeloProductosPV::mdlMostrarCategorias($tabla, $datos);

		return $respuesta;
	}

	

}
