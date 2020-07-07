<?php

class ControladorEntradaAlmacen{


static public function ctrBuscarMotivos($valor2, $item2){

$tabla = "tbl_motivos";

$respuesta = ModeloEntradaAlmacen::mdBuscarMotivos($tabla, $valor2, $item2);

return $respuesta;

}


static public function ctrBuscarProd($valor2, $item2){

    $tabla = "tbl_productos";
    
    $respuesta = ModeloEntradaAlmacen::mdBuscarPro($tabla, $valor2, $item2);
    
    return $respuesta;
    
    }

static public function ctrBuscarProductos($datos){

    $tabla = "tbl_productos";
    
    $respuesta = ModeloEntradaAlmacen::mdBuscarProductos($tabla, $datos);
    
    return $respuesta;
    
    }
    static public function ctrMostrarEntradaAlmacen($item, $valor){

		$tabla = "tbl_entradaalmacen";

		$respuesta = ModeloEntradaAlmacen::mdlMostrarFolioAlmacen($tabla, $item, $valor);

		return $respuesta;

	}

    static public function ctrInserEntAlmacen($datos){
        
        $tabla=" tbl_entradaalmacen";

        $respuesta = ModeloEntradaAlmacen::mdlInserEntAlmacen($tabla, $datos);

        return $respuesta;

    }

    static public function mostrarTblEntradasAlmacen($item, $valor){

        $respuesta= ModeloEntradaAlmacen::mdlMostrarEntradasAlmacen($item, $valor);
        
        return $respuesta;
    }

    
}