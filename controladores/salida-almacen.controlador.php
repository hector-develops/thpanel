<?php

class ControladorSalidaAlmacen{


static public function ctrBuscarCliente($valor2, $item2){

$tabla = "tbl_clientes";

$respuesta = ModeloSalidaAlmacen::mdBuscarClientes($tabla, $valor2, $item2);

return $respuesta;

}
static public function ctrBuscarProducto1($valor2, $item2){

    $tabla = "tbl_productos";
    
    $respuesta = ModeloSalidaAlmacen::mdBuscarProductos1($tabla, $valor2, $item2);
    
    return $respuesta;
    
    }


static public function ctrBuscarProductos($datos){

    $tabla = "tbl_productos";
    
    $respuesta = ModeloSalidaAlmacen::mdBuscarProductos($tabla, $datos);
    
    return $respuesta;
    
    }
    static public function ctrBuscarMovCaja($datos){

      $tabla = "tbl_mvtos_cajas";
      
      $respuesta = ModeloSalidaAlmacen::mdBuscarCajaDatos($tabla, $datos);
      
      return $respuesta;
      
      }


    
    static public function ctrBuscarAbono($datos){

      $tabla = "tbl_abonofiado";
      
      $respuesta = ModeloSalidaAlmacen::mdBuscarAbono($tabla, $datos);
      
      return $respuesta;
      
      }
    
    static public function ctrInserSalAlmacen($datos){
        
        $tabla=" tbl_ventas";

        $respuesta = ModeloSalidaAlmacen::mdlInserSalAlmacen($tabla, $datos);

        return $respuesta;

    }

    static public function ctrInsertAbono($datos){
        
      $tabla="tbl_abonofiado";

      $respuesta = ModeloSalidaAlmacen::mdlInserAbono($tabla, $datos);

      return $respuesta;

  }

  
  static public function ctrUpdateAbono($datos){
        
    $tabla="tbl_ventas";

    $respuesta = ModeloSalidaAlmacen::mdlUpdateAbono($tabla, $datos);

    return $respuesta;

}
static public function ctrUpdatecaja($datos){
        
  $tabla="tbl_mvtos_cajas";

  $respuesta = ModeloSalidaAlmacen::mdlUpdatecaja($tabla, $datos);

  return $respuesta;

}
static public function ctrUpdatecajacerrar($datos){
        
  $tabla="tbl_mvtos_cajas";

  $respuesta = ModeloSalidaAlmacen::mdlUpdatecajacerra($tabla, $datos);

  return $respuesta;

}
static public function ctrUpdatestatus($datos){
        
  $tabla="tbl_cajas";

  $respuesta = ModeloSalidaAlmacen::mdlUpdatestatus($tabla, $datos);

  return $respuesta;

}
static public function ctrUpdatediferencia($datos){
        
  $tabla="tbl_mvtos_cajas";

  $respuesta = ModeloSalidaAlmacen::mdlUpdatediferencia($tabla, $datos);

  return $respuesta;

}

    

    static public function ctrMostrarSalidaAlmacen($item, $valor){

		$tabla = "tbl_ventas";

		$respuesta = ModeloSalidaAlmacen::mdlMostrarFolioAlmacen($tabla, $item, $valor);

		return $respuesta;

    }

       

    static public function mdlMostrarSerieCaja($item, $valor){

      $tabla = "tbl_mvtos_cajas";
  
      $respuesta = ModeloSalidaAlmacen::mdlMostrarSerieCaja($tabla, $item, $valor);
  
      return $respuesta;
  
      }
  

    static public function mdlMostrarExistencias($item, $valor){

		$respuesta = ModeloSalidaAlmacen::mdlMostrarExistencias($item, $valor);

		return $respuesta;

    }
    
    
    static public function mdlMostrarSalidasAlmacen($item, $valor){

        $respuesta= ModeloSalidaAlmacen::mdlMostrarSalidasAlmacen($item, $valor);
        
        return $respuesta;
    }


    
    
    
}