<?php

try{

    function verifyUserLoginPassword(PDO $pdo, string $email, string $password):bool|array
{
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    //fetch() nous permet de récupérer une seule ligne
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // verif ok
        return $user;} else {
            echo "Identifiants incorrects";
        }}}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}




?>