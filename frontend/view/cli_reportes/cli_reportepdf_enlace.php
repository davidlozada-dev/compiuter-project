<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../../library/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$archivo = "http://localhost/Server/compiuter-project/frontend/view/cli_reportes/cli_reportepdf_listar.php";

$html = file_get_contents($archivo);

$dompdf->loadHtml(mb_convert_encoding($html, 'UTF-8'));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A3', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Lista_de_Clientes.pdf");
