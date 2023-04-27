<?php
$cartaCredito = filter_input(INPUT_POST, 'cartaCredito');
$documento = filter_input(INPUT_POST, 'documento');
$infoPoint = filter_input(INPUT_POST, 'infoPoint');
$tipoBiglietto = filter_input(INPUT_POST, 'tipoBiglietto');
$dispositivo = filter_input(INPUT_POST, 'dispositivo');

if (!$documento || $documento == '') {
    $documento = null;
}

if (!$cartaCredito || $cartaCredito == '') {
    $cartaCredito = null;
}

if (($cartaCredito || $documento) && $infoPoint && $tipoBiglietto) {
    require_once '../db/db.php';

    createTicket($documento, $cartaCredito, $infoPoint, $dispositivo, $tipoBiglietto);

    header('Location: ./index.php');
} else {
    echo "Errore";
}