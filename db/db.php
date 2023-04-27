<?php
function getPDO()
{
    $dsn = "mysql:host=localhost;dbname=traccia_esame_2019;charset=utf8mb4";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($dsn, "root", "", $options);
}

function getInfoPoints()
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM info_point");
    $stmt->execute();

    return $stmt->fetchAll();
}

function createTicket($tipo, $documento, $cartaCredito, $infoPoint, $dispositivo)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("INSERT INTO biglietto(id, tipo, documento, carta_credito, info_point, dispositivo) VALUES (DEFAULT, ?, ?, ?, ?, ?)");
    $stmt->execute([$tipo, $documento, $cartaCredito, $infoPoint, $dispositivo]);
}


function getBiglietto($idBiglietto)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM biglietto WHERE id = ?");
    $stmt->execute([$idBiglietto]);

    return $stmt->fetch();
}

function getPointsOfInterest()
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM poi");
    $stmt->execute();

    return $stmt->fetchAll();
}

function getPOI($id)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM poi WHERE id = ?");
    $stmt->execute([$id]);

    return $stmt->fetch();
}

function getVisitedPOIs($ticketId)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM visite WHERE biglietto = ?");
    $stmt->execute([$ticketId]);

    return $stmt->fetchAll();
}