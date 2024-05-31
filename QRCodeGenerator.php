<?php

require "vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;


$text = $_POST["text"];

$qr_code = QrCode::create($text)
                ->setSize(600)
                ->setMargin(40)
                ->setForegroundColor(new Color(0,0,0))
                ->setBackgroundColor(new Color(255, 255, 255));

$writer = new PngWriter;

$result = $writer->write($qr_code, logo: $logo, label: $label);

// Output the QR code image to the browser
header("Content-Type: " . $result->getMimeType());

echo $result->getString();

// Save the image to a file
$result->saveToFile("qr-code2.png");