<?php

class ControladorPromociones{


    static public function ctrInsertDocPromocion($datos){
        
        $tabla=" tbl_promociones";

        $respuesta = ModeloPromociones::mdlInsertDocPromociones($tabla, $datos);

        return $respuesta;

    }

    static public function ctrDeletePro($datos){
        
        $tabla=" tbl_prodprmocion";

        $respuesta = ModeloPromociones::mdldeletepro($tabla, $datos);

        return $respuesta;

    }
    

    static public function ctrMostrarCodigoPromocion($item, $valor){

		$tabla = "tbl_promociones";

		$respuesta = ModeloPromociones::mdlMostrarCodigoPromociones($tabla, $item, $valor);

		return $respuesta;

    }
    static public function ctrMostrarPromociones($item, $valor){

        $respuesta= ModeloPromociones::mdlMostrarPromociones($item, $valor);
        
        return $respuesta;
    }
    static public function ctrMostrarDetallePromocion($item, $valor){

        $respuesta= ModeloPromociones::mdlMostrarDetallePromociones($item, $valor);
        
        return $respuesta;
    }
    

}