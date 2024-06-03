<!DOCTYPE html>
<html lang="fr">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket -JO Paris 2024</title>
</head>
  
    
    <title>Document</title>
</head>
<body>
 <?php
            $pathImg = "assets/images/logo_jo.png";
            $typeImg = pathinfo($pathImg, PATHINFO_EXTENSION);
            $dataImg = file_get_contents($pathImg);
            $base64Img = 'data:assets/images/' . $typeImg . ';base64,' . base64_encode($dataImg);
            ?>
            
<h1>Mon ticket <img style="width: 50px; margin-left :20px " src="<?php echo $base64Img?>"/>
 </h1>

            <?php require_once "downloadTicket.php";?>
            
            <div style=" text-align : center;">
            <div style="background-color : #ffc107; font-size : 1.8rem; padding-bottom : 5px">
            <div><?=$id['name']?> <?=$id['surname']?></div>
            <div><?=$id['email']?></div>
            </div>
            <?php
            $path = "ticketsGenerated/".$QRCode;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:ticketsGenerated/' . $type . ';base64,' . base64_encode($data);
            ?>
            <img src="<?php echo $base64?>" style="width:270px;" />
            </div>
                    
            
            

    
</body>
</html>