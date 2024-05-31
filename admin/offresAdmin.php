<?php

function getOffres(PDO $pdo):array
{
    $query = $pdo->prepare("SELECT * FROM offres");
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
};

function getOfferById(PDO $pdo, int $offerId):array|bool
{
    $query = $pdo->prepare('SELECT * FROM offres WHERE id_offer = :offerId');
    $query->bindValue(':offerId', $offerId, PDO::PARAM_INT);
    $query->execute();

    return $query;
}

function saveOffer(PDO $pdo, int $offerId=null, string $offerName, int $ticketsNum):int|bool
{
    if ($offerId) {
        // UPDATE
        $query = $pdo->prepare("UPDATE offres SET offer_name = :offer_name, tickets_num = :tickets_num
        WHERE id_offer = :offerId");
        $query->bindValue(':offerId', $offerId, PDO::PARAM_INT);
    } else {
        // INSERT
        $query = $pdo->prepare("INSERT INTO offres (offer_name, tickets_num)
                                VALUES (:offer_name, :tickets_num)");
    }
    $query->bindValue(':offer_name', $offerName, PDO::PARAM_STR);
    $query->bindValue(':tickets_num', $ticketsNum, PDO::PARAM_INT);

    $res = $query->execute();
    if ($res) {
        if ($offerId) {
            return $offerId;
        } else {
            return $pdo->lastInsertId();
        }
    } else {
        return false;
    }
}

function updateOffer(PDO $pdo, int $offerId=null, string $offerName, int $ticketsNum):bool
{
 
    $query = $pdo->prepare("UPDATE offres SET offer_name = :offer_name, tickets_num = :tickets_num
    WHERE id_offer = :offerId");
    $query->bindValue(':id_offer', $offerId, PDO::PARAM_INT);
    $query->bindValue(':offer_name', $offerName, PDO::PARAM_STR);
    $query->bindValue(':tickets_num', $ticketsNum, PDO::PARAM_INT);

    return $query->execute();
    
}

function deleteOffer(PDO $pdo, int $offerId):bool
{
    $query = $pdo->prepare('DELETE FROM offres WHERE id_offre = :offerId');
    $query->bindValue(':offerId', $offerId, PDO::PARAM_INT);
    
    return $query->execute();
}