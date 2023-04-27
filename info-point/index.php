<?php
require_once '../db/db.php';

$infoPoints = getInfoPoints();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title>Point Of Interest</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
    <div class="container-fluid">
        <div class="text-center">
            <h1>Point Of Interest</h1>
            <p>Crea biglietti</p>
        </div>
        <form method="post" action="./create-ticket.php" class="text-center">
            <div class="mt-3">
                <label for="documento">Documento</label>
                <input type="text" name="documento" id="documento">
            </div>

            <div class="mt-3">
                <label for="cartaCredito">Carta credito</label>
                <input type="number" name="cartaCredito" id="cartaCredito">
            </div>

            <div class="mt-3">
                <label for="infoPoint">InfoPoint</label>
                <select name="infoPoint" id="infoPoint">
                    <option selected disabled>Seleziona InfoPoint</option>
                    <?php foreach ($infoPoints as $infoPoint): ?>
                        <option value="<?= $infoPoint['id'] ?>">
                            <?= $infoPoint['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mt-3">
                <label for="tipoBiglietto">Tipo Biglietto</label>
                <select name="tipoBiglietto" id="tipoBiglietto">
                    <option selected disabled>Seleziona tipo biglietto</option>
                    <option value="base">Base</option>
                    <option value="intermedio">Intermedio</option>
                    <option value="pieno">Pieno</option>
                </select>
            </div>

            <div class="mt-3">
                <label for="dispositivo">Dispositivo</label>
                <input type="text" name="dispositivo" id="dispositivo">
            </div>

            <div class="mt-3">
                <button type="submit">Crea biglietto</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
