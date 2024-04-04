<?php
require_once ".././config.php";

$horarioId = $_GET['horarioId'];
$agendaId = $_GET['agendaId'];

if (isset($_GET['horarioId']) && is_numeric($_GET['horarioId']) && isset($_GET['agendaId']) && is_numeric($_GET['agendaId'])) {
    $sql_excluir = "DELETE FROM agenda WHERE id = ?";
    $stmt_excluir = $conn->prepare($sql_excluir);

    $stmt_excluir->bind_param('i', $agendaId);
    $stmt_excluir->execute();

    if ($stmt_excluir->affected_rows > 0) {
        $sqlUpdate = "UPDATE horario SET reservado = 0 WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param('i', $horarioId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: /sistema_agendamento/agenda/agendamentos.php");
    } else {
        echo "Erro ao tentar excluir agenda";
    }

    if ($stmt_excluir) {
        $stmt_excluir->close();
    }
}
?>;