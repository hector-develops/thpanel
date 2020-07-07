<?php

require_once "../../../controladores/zapatos.controlador.php";
require_once "../../../modelos/zapatos.modelo.php";

class imprimirFactura{

public $codigoApartado;

public function traerImpresionApartado(){


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------
$fecha= date ("j/n/Y");

$bloque1 = <<<EOF

	<table style="font-size:15px; padding:5px 5px;">
		
		<tr>
	
			<td style="width:150px "><img src="images/Logo_siri.jpg"></td>
			<td style=" width:300;"><br><b> REPORTE DE EXISTENCIAS STOCK </b> </td>

		</tr>		
		<tr>	
			<td><p style="font-size:10px; "><b>Al dia de : </b>$fecha</p></td>
		</tr>
	</table><br><br><br>
	

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


$bloque2 = <<<EOF

	<table style="font-size:8px; padding:5px 5px;">

		<tr>
			<td style="border: 1px solid #0000; background-color:white; width:100px; text-align:center"> <b> Codigo </b> </td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>22</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>225</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>23</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>235</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>24</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>245</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>25</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>255</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>26</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>265</b></td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center"><b>270</b></td>
		</tr>


	</table>

EOF;
$pdf->writeHTML($bloque2, false, false, false, false, '');
$item = null;
$valor = null;
$zapatos = ControladorZapatos::ctrStockZapatos($item, $valor);


foreach ($zapatos as $key => $value) {
	# code...
	$codigoZapato = $value["codigo_zapato"];
	$p220 = $value["pares22"];
	$p225 = $value["pares225"];
	$p230 = $value["pares23"];
	$p235 = $value["pares235"];
	$p240 = $value["pares24"];
	$p245 = $value["pares245"];
	$p250 = $value["pares25"];
	$p255 = $value["pares255"];
	$p260 = $value["pares26"];
	$p265 = $value["pares265"];
	$p270 = $value["pares27"];


$bloque3 = <<<EOF

	<table style="font-size:8px; padding:5px 5px;">

		<tr>
			<td style="border: 1px solid #0000; background-color:white; width:100px; text-align:center">$codigoZapato</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p220</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p225</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p230</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p235</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p240</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p245</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p250</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p255</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p260</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p265</td>
			<td style="border: 1px solid #0000; background-color:white; width:40px; text-align:center">$p270</td>
		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
}

$bloque2 = <<<EOF

	<table style="font-size:8px; padding:5px 5px;">

		<tr>
			<td> </td>
		</tr>


	</table>

EOF;
$pdf->writeHTML($bloque2, false, false, false, false, '');
		





$pdf->Output();
// $pdf->Output('factura.pdf', 'D');
}

}

$factura = new imprimirFactura();
$factura -> codigoApartado = 1;
$factura -> traerImpresionApartado();

?>