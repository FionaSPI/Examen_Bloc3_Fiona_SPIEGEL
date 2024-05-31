<?php

$dsn = 'mysql:host=localhost;dbname=bddJo';
$username = 'root';
$password = '';

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Récupérer les données du formulaire de connexion
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];

    //Récupérer les utilisateurs 
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    //Est-ce que l’utilisateur (mail) existe ?
    if($stmt->rowCount() == 1){
        $monUser = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($passwordForm, $monUser['password'])){
        header("Location: index.php");
        exit;
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