<?php

class ControladorRetiros{


static public function ctrBuscarMotivo($valor2, $item2){

$tabla = "tbl_motivos";

$respuesta = ModeloRetiros::mdBuscarMotivos($tabla, $valor2, $item2);

return $respuesta;

}

static public function ctrBuscarProveedor($valor2, $item2){

    $tabla = "tbl_clientes";
    
    $respuesta = ModeloRetiros::mdBuscarProveedor($tabla, $valor2, $item2);
    
    return $respuesta;
    
    }
    
    static public function ctrBuscarCajero($valor2, $item2){

        $tabla = "usuarios";
        
        $respuesta = ModeloRetiros::mdBuscarCajero($tabla, $valor2, $item2);
        
        return $respuesta;
        
        } 

        static public function ctrBuscarCajaTotal($datos){

            $tabla = "tbl_mvtos_cajas";
            
            $respuesta = ModeloRetiros::mdBuscarCajaTotal($tabla, $datos);
            
            return $respuesta;
            
            }

            
        static public function ctrInserRetiro($datos){

            $tabla = "tbl_retiros";
            
            $respuesta = ModeloRetiros::mdlInsertarretiros($tabla, $datos);
            
            return $respuesta;
            
            }

            static public function ctrUpdateRetiro($datos){

                $tabla = "tbl_mvtos_cajas";
                
                $respuesta = ModeloRetiros::mdlUpdateretiros($tabla, $datos);
                
                return $respuesta;
                
                }

            
            
}