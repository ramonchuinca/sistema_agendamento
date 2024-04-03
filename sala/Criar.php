<?php
require_once ".././config.php";

$nome = $_POST['nome'];
$recursos = $_POST["recursos"];
$capacidade = $_POST["capacidade"];
$status = 1;

$sql = "INSERT INTO sala (nome, recursos, capacidade, status) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ssii', $nome, $recursos, $capacidade, $status);
$stmt->execute();

// Verificando se a inserção foi bem-sucedida
if ($stmt->affected_rows > 0) {
    $stmt->close();
    $conn->close();
    header("Location: /sistema_agendamento/sala/Lista.php");
} else {
    echo "Erro ao tentar adicionar usuário";
}

?>;