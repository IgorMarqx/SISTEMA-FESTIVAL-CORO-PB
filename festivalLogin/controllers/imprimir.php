<?php

use Dompdf\Dompdf;

require_once '../assets/dompdf/autoload.inc.php';

$dompdf = new Dompdf(["enable_remote" => true]);
$dompdf->loadHtml("");

ob_start();
require './pdf.php';
$dompdf->loadHtml(ob_get_clean());

// $pdf = ob_get_clean();
// echo $pdf;


// Definir fonte
$dompdf->set_Option("defaultFont", 'sans');

// Definir papel
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("Informações_Candidato.pdf");

