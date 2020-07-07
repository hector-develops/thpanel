<?php

require_once "../../../controladores/ventasuno.controlador.php";
require_once "../../../modelos/ventasuno.modelo.php";
require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";
require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";


class imprimirFactura{

public $codigoApartado;

public function traerImpresionApartado(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo_venta";
$valorVenta = $this->codigoApartado;

$respuestaVenta = ControladorVentast1::ctrMostrarApartados($itemVenta, $valorVenta);

$fecha = substr($respuestaVenta["fecha_venta"],0,-8);
$fechaLimite =$respuestaVenta["fecha_vencido"];
$productos = json_decode($respuestaVenta["productos_venta"], true);
$neto = number_format($respuestaVenta["neto"],2);
$impuesto = number_format($respuestaVenta["impuesto_venta"],2);
$total = $respuestaVenta["total_venta"];

//TRAEMOS LA INFORMACIÓN DEL CLIENTE
$itemCliente="id_cliente";
$valorCliente=$respuestaVenta["cliente_venta"];

$respuestaCliente=ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
//TRAEMOS LA INFORMACIÓN DEL VENDEDOR
$itemVendedor="id";
$valorVendedor=$respuestaVenta["id_vendedor"];

$respuestaVendedor=ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/Logo_siri.jpg"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Dirección: Avenida olímpica 101 – 1



				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 477-514-7174
					
					<br>
					siriusshoes@gmail.com
					
					<br>
					Facebook: Sirius

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>Apartado-V No.<br>$valorVenta</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

$bloque2= <<<EOF

	<table>
		<tr>
			<td style="width:540px"><img src="images/back.jpg"></td>
		</tr>
	</table>
	
	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:370px">

				Cliente: $respuestaCliente[nombre_cliente]
			</td>
			<td style="border: 1px solid #666; background-color:white; width:170px; text-align:right">

			Fecha realizacion: $fecha

			</td>

		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:350px">

				Vendedor: $respuestaVendedor[nombre]
			</td>
			<td style="border: 1px solid #666; background-color:white; width:190px; text-align:right">

			Fecha Limite: $fechaLimite

			</td>


		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px"></td>
		</tr>

	</table

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');


$bloque3= <<<EOF
	
	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border: 2px solid #666; background-color:white; width:250px; text-align:center">Productos</td>
			<td style="border: 2px solid #666; background-color:white; width:60px; text-align:center">Talla</td>
			<td style="border: 2px solid #666; background-color:white; width:70px; text-align:center">Cantidad</td>
			<td style="border: 2px solid #666; background-color:white; width:80px; text-align:center">Valor Unit.</td>
			<td style="border: 2px solid #666; background-color:white; width:80px; text-align:center">Valor Total</td>
		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

foreach ($productos as $key => $item) {

	$itemProducto= "nombre_producto";
	$valorProducto= $item["descripcion"];
	$orden= null;

	$precioTotal= number_format($item["total"]);



$bloque4= <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="border: px solid #666; background-color:white; width:250px; text-align:center">$item[descripcion]</td>
			<td style="border: 1px solid #666; background-color:white; width:60px; text-align:center">$item[talla]</td>
			<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">$item[cantidad]</td>
			<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">$item[precio]</td>
			<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">$precioTotal</td>
		</tr>


	</table>
	<br>
	<br>
	<br>
	<br>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

 }

 $bloque5= <<<EOF
	<h2>Abonos realizados</h2>
	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border: 2px solid #666; background-color:white; width:150px; text-align:center">Codigo Apartado</td>
			<td style="border: 2px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
			<td style="border: 2px solid #666; background-color:white; width:155px; text-align:center">Metodo Pago</td>
			<td style="border: 2px solid #666; background-color:white; width:155px; text-align:center">Fecha Abono/Pago</td>
		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
	


$respuestaAbonos=ControladorVentast1::ctrMostrarAbonos($itemVenta, $valorVenta);
foreach ($respuestaAbonos as $key => $item) {

	$codigoAb= $item["codigo_venta"];
	$cantidadAbono=number_format($item["cantidad_abono"],2);
	$metodoPago=$item["metodo_pago"];
	$fechaPago=substr($item["fecha_pago"],0,-8);
	
	
 //$codigoAbono= $item["codigo_venta"];
$bloque6= <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="border: px solid #666; background-color:white; width:150px; text-align:center">$item[codigo_venta]</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">$cantidadAbono</td>
			<td style="border: 1px solid #666; background-color:white; width:155px; text-align:center">$metodoPago</td>
			<td style="border: 1px solid #666; background-color:white; width:155px; text-align:center">$fechaPago</td>
		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');

 }


$sumaAbonos=ControladorVentast1::ctrSumarAbonos($itemVenta, $valorVenta);
foreach ($sumaAbonos as $key => $item) {


	$totalSuma=$item["total"];
	$saldoPendiente=$total-$totalSuma;


$bloque7 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
				Neto:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $neto
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Impuesto:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $impuesto
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:300px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:140px; text-align:center">
				Total Apartado/Venta:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $total
			</td>

		</tr>
		<br>
		<br>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:300px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:140px; text-align:center">
				Suma total Abonos:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $totalSuma
			</td>

		</tr>
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:300px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:140px; text-align:center">
				Saldo Pendiente:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $saldoPendiente
			</td>

		</tr>


	</table>

EOF;



$pdf->writeHTML($bloque7, false, false, false, false, '');

}


$pdf->Output('factura.pdf', 'D');
}

}

$factura = new imprimirFactura();
$factura -> codigoApartado = $_GET["codigoApartado"];
$factura -> traerImpresionApartado();

?>