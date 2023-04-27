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

function createTicket($documento, $cartaCredito, $infoPoint, $dispositivo, $tipoBiglietto)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("INSERT INTO biglietto(id, documento, carta_credito, info_point, dispositivo) VALUES (DEFAULT, ?, ?, ?, ?)");
    $stmt->execute([$documento, $cartaCredito, $infoPoint, $dispositivo]);

    $ticketId = $pdo->lastInsertId();

    switch ($tipoBiglietto) {
        case 'B':
            $stmt = $pdo->prepare("INSERT INTO biglietto_base(biglietto) VALUES (?)");
            $stmt->execute([$ticketId]);
            break;
        case 'I':
            $stmt = $pdo->prepare("INSERT INTO biglietto_intermedio(biglietto) VALUES (?)");
            $stmt->execute([$ticketId]);
            break;
        case 'P':
            $stmt = $pdo->prepare("INSERT INTO biglietto_pieno(biglietto) VALUES (?)");
            $stmt->execute([$ticketId]);
            break;
    }
}
