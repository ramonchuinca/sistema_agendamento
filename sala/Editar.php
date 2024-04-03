<?php
require_once ".././config.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$recursos = $_POST["recursos"];
$capacidade = $_POST["capacidade"];
$status = $_POST["status"] == 1 ? 1 : 0;

$sql = "UPDATE sala SET nome = ?, recursos = ?, capacidade = ?, status = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ssiii', $nome, $capacidade, $recursos, $status, $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $stmt->close();
    $conn->close();
    header("Location: /sistema_agendamento/sala/Lista.php");
} else {
    echo "Erro ao tentar adicionar usuário";
}

?>;