<?php

// require_once "../controladores/productos.controlador.php";
// require_once "../modelos/productos.modelo.php";
require_once "../controladores/tallas.controlador.php";
require_once "../modelos/tallas.modelo.php";

require_once "../controladores/stock-tiendauno.controlador.php";
require_once "../modelos/stktiendauno.modelo.php";


class AjaxProductos{

  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idProducto;
  public $traerProductos;
  public $nombreProducto;


  public function ajaxEditarProducto(){

    if($this->traerProductos=="ok"){

      $item=null;
      $valor=null;
      $respuesta = ControladorProductos::ctrMostrarPrductos($item, $valor);

      echo json_encode($respuesta);
    }else if($this->nombreProducto != ""){

      $item = "nombre_producto";
      $valor = $this->idProducto;

      $respuesta = ControladorProductos::ctrMostrarPrductos($item, $valor);

      echo json_encode($respuesta);
    } else{
      
      $item = "id_producto";
      $valor = $this->idProducto;

      $respuesta = ControladorProductos::ctrMostrarPrductos($item, $valor);

      echo json_encode($respuesta);
    }   

  }
}
  

/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){

  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTOS PRODUCTO
=============================================*/ 

if(isset($_POST["traerProductos"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST["traerProductos"];
  $traerProductos -> ajaxEditarProducto();

}

/*=============================================
MOSTRAR PRODUCTOS PRODUCTO
=============================================*/ 

if(isset($_POST["nombreProducto"])){

  $nombreProducto = new AjaxProductos();
  $nombreProducto -> nombreProducto = $_POST["nombreProducto"];
  $nombreProducto -> ajaxEditarProducto();

}

