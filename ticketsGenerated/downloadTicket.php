
        <?php
        require_once './lib/session.php';
        require_once './lib/offers.php';
        require_once "./lib/pdo.php";
        require_once './lib/user.php';
        require_once "./vendor/autoload.php";


        $tickets = $_REQUEST["tickets"];
        $id = $_SESSION["users"];
        $date = date('d/m/Y H:i:s');
        $query = "INSERT INTO `tickets`(key_one, tickets_num, time_tickets) VALUES (:id, :tickets, :dateTickets)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':tickets', $tickets);
        $stmt->bindValue(':id', $id['id_user_key_one']);
        $stmt->bindValue(':dateTickets', $date);
        $stmt ->execute();
        
        
        
        $queryT = "SELECT * FROM tickets WHERE `key_one` = :id AND `time_tickets` = :time_tickets ";
        $stmtQR = $pdo->prepare($queryT);
        $stmtQR->bindValue(':id', $id['id_user_key_one']);
        $stmtQR->bindValue(':time_tickets', $date);
        $stmtQR->execute();
        $result = $stmtQR->fetch(PDO::FETCH_ASSOC);
        $QR_code = $result['key_one'].'-'.$result['id_tickets_key_two'].'.JPEG';
        $QRCode = $result['id_tickets_key_two'].'.JPEG';
        
        $nameqrcode = "UPDATE tickets SET name_qrcode =  CONCAT(id_tickets_key_two, '.JPEG')";
        $stmtqrcode = $pdo->prepare($nameqrcode);
        $stmtqrcode->execute();

        use Endroid\QrCode\QrCode;
        use Endroid\QrCode\Writer\PngWriter;
        use Endroid\QrCode\Color\Color;
        use Endroid\QrCode\Label\Label;
        

        $qr_code = QrCode::create($QR_code)
                        ->setSize(600)
                        ->setMargin(40)
                        ->setForegroundColor(new Color(0,0,0))
                        ->setBackgroundColor(new Color(255, 255, 255));

        $writer = new PngWriter;

        $resultQR = $writer->write($qr_code);

        // Output the QR code image to the browser
        header("Content-Type: " . $resultQR->getMimeType());

        $resultQR->getString();
        

        // Save the image to a file
        $resultQR->saveToFile("ticketsGenerated/".$QRCode);
       
        

      
