<?php
session_start();

if (!isset($_SESSION["fruta"])) {
    exit;
}

$fruta = $_SESSION["fruta"];

echo "Parabéns, a compra da fruta: $fruta foi reservada com sucesso.";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <a href="registro2.php">Sair</a>
</body>
</html>