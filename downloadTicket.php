<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Votre ticket -JO Paris 2024</title>
</head>


<body>
    <header class="bg-white">
        <?php
        require_once __DIR__. '/templates/header.php';
        require_once 'lib/offers.php';
        require_once "lib/pdo.php";
        require_once 'lib/user.php';
        require_once "vendor/autoload.php";


        $tickets = $_REQUEST["tickets"];
        $id = $_SESSION["users"];
        $date = date('d/m/Y H:i:s');
        $query = "INSERT INTO `tickets`(key_one, tickets_num, time_tickets) VALUES (:id, :tickets, :dateTickets)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':tickets', $tickets);
        $stmt->bindValue(':id', $id['id_user_key_one']);
        $stmt->bindValue(':dateTickets', $date);
        $stmt->execute();
    
        
        
        $queryT = "SELECT * FROM tickets WHERE `key_one` = :id AND `time_tickets` = :time_tickets ";
        $stmtQR = $pdo->prepare($queryT);
        $stmtQR->bindValue(':id', $id['id_user_key_one']);
        $stmtQR->bindValue(':time_tickets', $date);
        $stmtQR->execute();
        $result = $stmtQR->fetch(PDO::FETCH_ASSOC);
        $QRCode = $result['key_one'].'-'.$result['id_tickets_key_two'];

        use Endroid\QrCode\QrCode;
        use Endroid\QrCode\Writer\PngWriter;
        use Endroid\QrCode\Color\Color;
        use Endroid\QrCode\Label\Label;

        $qr_code = QrCode::create($QRCode)
                        ->setSize(600)
                        ->setMargin(40)
                        ->setForegroundColor(new Color(0,0,0))
                        ->setBackgroundColor(new Color(255, 255, 255));

        $writer = new PngWriter;

        $resultQR = $writer->write($qr_code);

        // Output the QR code image to the browser
        header("Content-Type: " . $resultQR->getMimeType());

        echo $resultQR->getString();

        // Save the image to a file
        $resultQR->saveToFile("qr-code4.png");
        
        ?>
    </header>

    <main>

    </main>

    <footer class='bg-white'>
        <?php include_once __DIR__."/templates/footer.php"?>
    </footer>

</body>

</html>