<?php
require_once ".././config.php";

$horarioId = $_POST['horario_id'];
$organizador = $_POST['organizador'];
$assunto = $_POST["assunto"];
$participantes = $_POST["participantes"];

$sqlInsert = "INSERT INTO agenda (organizador, assunto, participantes, horarioId) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bind_param('ssii', $organizador, $assunto, $participantes, $horarioId);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $sqlUpdate = "UPDATE horario SET reservado = 1 WHERE id = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param('i', $horarioId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: /sistema_agendamento/agenda/agendamentos.php");
} else {
    echo "Erro ao tentar adicionar usuário";
}
?>;