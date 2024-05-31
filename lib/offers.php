<?php

function getOffers(PDO $pdo):array
{
    $query = $pdo->prepare("SELECT * FROM offres");
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
};


function getTickets(PDO $pdo):array
{
    $queryT = $pdo->prepare("SELECT * FROM tickets");
    $queryT->execute();

    return $queryT->fetchAll(PDO::FETCH_ASSOC);
}




