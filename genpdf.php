<?php use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'lib/pdo.php';


$sqlPDF = 'SELECT * FROM `users`';

$queryPDF = $pdo->query($sqlPDF);

$users =$queryPDF->fetchAll();

ob_start();
require_once 'ticketsGenerated/content-php.php';
$html =ob_get_contents();
ob_end_clean();

require_once 'vendor/autoload.php';



$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$dompdf = new Dompdf($options);

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('A6','portrait');

$dompdf->render();

$fichier = 'mon-ticket.pdf';
$dompdf->stream($fichier);