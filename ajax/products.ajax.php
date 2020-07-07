<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductosPV{

    public function ajaxNewProductoPV(){

        $datos = array(
            'codigo_producto' => $_POST["Codigo"],
            'nombre_producto' => $_POST["Nombre"],
            'fk_categoria' => $_POST["categoria"],
            'precio_compra' => $_POST["PrecioCompra"],
            'precio_venta' => $_POST["PrecioVenta"],
            'um_venta' => $_POST["umVenta"],
            'um_compra' => $_POST["umCompra"],
            'usuario_alta' => $_POST["Usuario"],
            'foto' => $_POST["Foto"]
        );
        
        $respuesta = ControladorProductosPV::ctrCrearProductosPV($datos);
        // echo json_encode($respuesta);
        echo ($respuesta);
    }

    public function ajaxNewProductoValidarPV(){
        $item = 'codigo_producto'; 
        $valor =  $_POST["codigoProductoValidar"];
        $respuesta = ControladorProductosPV::ctrValidarProductosPV($item, $valor);
        $retVal = ($respuesta[0] == null) ? "error" : "ok" ;
        echo ($retVal);
    }

    public function ajaxGuardarImagen(){

		if (is_array($_FILES) && count($_FILES) > 0) {
			
			if (($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/gif")) {
            
                $alt = rand(1,100000); 
                $nameImage = "producto".$alt.".jpg";
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "../vistas/img/productos/".$_FILES['file']['name'])) {
                    
                    
                    $respuesta = "vistas/img/productos/".$_FILES['file']['name'];

                    echo json_encode($respuesta);
                    

				} else {
					echo "error 1";
				}
			} else {
				echo "error 2 ";
			}
		}else {
			echo "error 3";
		}
    }

    public function ajaxEditarProductoPV(){
        $item = 'codigo_producto'; 
        $valor =  $_POST["codigo_producto"];
        $respuesta = ControladorProductosPV::ctrValidarProductosPV($item, $valor);  
        echo json_encode($respuesta);
    }
    
    public function ajaxEditarProductoPostPV(){
        $datos = array(
            'codigo_producto' => $_POST["codigo_update"],
            'nombre_producto' => $_POST["nombre"],
            'precio_compra' => $_POST["precioCompra"],
            'precio_venta' => $_POST["precioVenta"],
            'foto' => $_POST["imagenProducto"]
        );
        $respuesta = ControladorProductosPV::ctrEditarProductosPostPV($datos);
        echo json_encode($respuesta);
        // echo json_encode($datos);

    }
    public function ajaxBorrarProductoPV(){

        $datos = array(
            'id_producto' => $_POST["eliminacionP"],
            'foto' => $_POST["fotoProductoD"]
        );

        var_dump($datos);
        $respuesta = ControladorProductosPV::ctrBorrarProductosPostPV($datos);
        echo json_encode($respuesta);
        // echo json_encode($datos);

    }

    public function ajaxCambiarStatus(){
        $item = 'id_producto'; 
        $valor =  $_POST["id_producto"];
        $respuesta = ControladorProductosPV::ctrValidarProductosPV($item, $valor);  
        echo json_encode($respuesta);
    }


	public function ajaxCambiarStatusProductos(){

		$datos = array(
			"id_producto" => $_POST["idStatusProducto1"],
			"status_productos" => $_POST["statusProducto"]		
		);

		$respuesta = ControladorProductosPV::crtUpdateStatusProductos($datos);

    
		echo $respuesta;
	}

	public function ajaxCambiarStatusProductos1(){

		$datos = array(
			"id_producto" => $_POST["idStatusProducto2"],
			"status_productos" => $_POST["statusProducto"]		
		);

		$respuesta = ControladorProductosPV::crtUpdateStatusMProductos1($datos);

    
		echo $respuesta;
	}


	public function ajaxCodigosBarra(){
        $item = null;
        $valor = null;
        $prodoctos = ControladorProductosPV::ctrMostrarProductosPV($item, $valor);
        echo json_encode($prodoctos);
    }	
}
  


if(isset($_POST["Codigo"])){

  $editarProducto = new AjaxProductosPV();
  $editarProducto -> ajaxNewProductoPV();

}


if(isset($_POST["codigoProductoValidar"])){

    $editarProducto = new AjaxProductosPV();
    $editarProducto -> ajaxNewProductoValidarPV();

}

if(isset($_FILES["file"]["type"])){

    $validar = new AjaxProductosPV();
    $validar -> ajaxGuardarImagen();

}

if(isset($_POST["codigo_producto"])){

    $editarProducto = new AjaxProductosPV();
    $editarProducto -> ajaxEditarProductoPV();
    
}

if(isset($_POST["codigo_update"])){

    $editarProducto = new AjaxProductosPV();
    $editarProducto -> ajaxEditarProductoPostPV();
    
}
if(isset($_POST["id_producto"])){

    $editarProducto = new AjaxProductosPV();
    $editarProducto -> ajaxCambiarStatus();
    
}

if(isset($_POST["idStatusProducto1"])){
    $statusProctos = new AjaxProductosPV();
    $statusProctos -> ajaxCambiarStatusProductos();

}

if(isset($_POST["idStatusProducto2"])){
    $statusProctos = new AjaxProductosPV();
    $statusProctos -> ajaxCambiarStatusProductos1();

}

if(isset($_POST["codigoBarraProductos"])){
    $statusProctos = new AjaxProductosPV();
    $statusProctos -> ajaxCodigosBarra();
}

if(isset($_POST["eliminacionP"])){

    echo ('un_nombre');
    $deleteProducto = new AjaxProductosPV();
    $deleteProducto -> ajaxBorrarProductoPV();
    
}