<?php
require_once __DIR__ . 'lib/pdo.php';
require_once __DIR__ . '/lib/user.php';
require_once __DIR__ . '/lib/session.php';

    //Récupérer les données du formulaire d’inscription 
    $nameForm = $_POST['name'];
    $surnameForm = $_POST['surname'];
    $emailForm = $_POST['email'];
    $telForm = $_POST['tel_num_users'];
    $passwordForm = $_POST['password'];

    //Vérifier l’unicité de l’adresse mail
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    //Vérifier que l'email de l’utilisateur existe
    if($stmt->rowCount() > 0){
        die("Cette adresse email est déjà utilisée");
    }

    // Hashage(encryptage)
    $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);

    //Insérer les données dans la base 
    $insertQuery = "INSERT INTO users ( name, surname, email, tel_user, password) VALUES (:name, :surname, :email, :tel_num_users, :password)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':name', $nameForm);
    $stmt->bindParam(':surname', $surnameForm);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':tel_num_users', $telForm);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->execute();
    session_start();

    header("Location: tickets.php");

?>