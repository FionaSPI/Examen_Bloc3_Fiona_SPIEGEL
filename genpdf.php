<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require_once '../lib/pdo.php';

$sql = 'SELECT * FROM `users`';

$query = $pdo->query($sql);

$users =$query->fetchAll();

ob_start();
require_once 'pdf-content.php';
$html =ob_get_contents();
ob_end_clean();
;

require_once '../vendor/autoload.php';


$options = new Options();

$options->set('defaultFoont','DejaVuSans');


$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$fichier = 'mon-pdf.pdf';
$dompdf->stream($fichier);




