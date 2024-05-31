<?php
try
{
    $pdo = new PDO("mysql:dbname=bddjo;host=localhost;charset=utf8mb4", "root", "");
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>