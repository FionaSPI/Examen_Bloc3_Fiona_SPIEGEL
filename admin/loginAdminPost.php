<?php

$dsn = 'mysql:host=localhost;dbname=bddJo';
$username = 'root';
$password = '';

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Récupérer les données du formulaire de connexion
    $identifiantForm = $_POST['identifiant'];
    $passwordForm = $_POST['password'];

    //Récupérer l'administrateur 
    $query = "SELECT * FROM admin WHERE identifiant = :identifiant";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':identifiant', $identifiantForm);
    $stmt->execute();

    //Est-ce que le compte administrateur existe ?
    if($stmt->rowCount() == 1){
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($passwordForm, $admin['password'])){
            header("Status: 301 Moved Permanently", false, 301);
            header("Location: adminSpace.php");
            exit;
            echo "Connexion réussie ! Bienvenue !";
        }else{
            echo "Identifiants incorrects";
        }
    }
    else{
        echo "Identifiants incorrects";
    }
}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}

?>
