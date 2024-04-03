<?php
require_once ".././config.php";

$salaId = $_POST['salaId'];
$data = $_POST['data'];
$horaInicial = $_POST["horaInicial"];
$horaFinal = $_POST["horaFinal"];
$reservado = 0;

$sql = "INSERT INTO horario(data, horaInicial, horaFinal, reservado, salaId) VALUES(?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('sssii', $data, $horaInicial, $horaFinal, $reservado, $salaId);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $stmt->close();
    $conn->close();
    header("Location: /sistema_agendamento/sala/Horario.php?salaId=" . $salaId);
} else {
    echo "Erro ao tentar adicionar horário";
}

?>;