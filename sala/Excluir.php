<?php
require_once ".././config.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $excluir_id = $_GET['id'];
    $sql_excluir = "DELETE FROM Sala WHERE id = ?";
    $stmt_excluir = $conn->prepare($sql_excluir);

    if ($stmt_excluir) {
        $stmt_excluir->bind_param('i', $excluir_id);
        $stmt_excluir->execute();

        if ($stmt_excluir->affected_rows > 0) {
            header("Location: /sistema_agendamento/sala/Lista.php");
        } else {
            echo "Erro ao tentar excluir sala";
        }
    } else {
        echo "Erro na preparação da consulta de exclusão: " . $conn->error;
    }

    if ($stmt_excluir) {
        $stmt_excluir->close();
    }
}
?>;