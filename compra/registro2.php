<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fruta = $_POST['fruta'];
    $peso = $_POST['peso'];
    $quantidade = $_POST['quantidade'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=autenticacao", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO compra (fruta, peso, quantidade) VALUES (:fruta, :peso, :quantidade)");
        $stmt->bindParam(':fruta', $fruta);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION["fruta"] = $fruta; // Defina a variável de sessão "fruta"
            $_SESSION["mensagem"] = "Compra bem-sucedida";
            header("Location: dashboard2.php");
            exit;
        } else {
            $_SESSION["mensagem"] = "Nenhum registro inserido";
        }
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
</head>
<body>
<h2>Compra</h2>
<form method="post">
    <input type="text" name="fruta" placeholder="Fruta" required><br>
    <input type="text" name="peso" placeholder="Peso" required><br>
    <input type="number" name="quantidade" placeholder="Quantidade" required><br>
    <input type="submit" value="Reservar">
</form>
</body>
</html>