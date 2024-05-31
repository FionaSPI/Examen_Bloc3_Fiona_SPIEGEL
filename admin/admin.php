<?php

try{

    function verifyAdminLoginPassword(PDO $pdo, string $identifiants, string $password):bool|array
{
    $query = $pdo->prepare("SELECT * FROM admin WHERE identifiants = :identifiants");
    $query->bindValue(':identifiants', $identifiants, PDO::PARAM_STR);
    $query->execute();
    //fetch() nous permet de récupérer une seule ligne
    $admin = $query->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        // verif ok
        return $admin;} else {
            echo "Identifiants incorrects";
        }}}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}




?>