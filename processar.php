<?php
require_once "./config.php";

// Verifica se os dados foram enviados via método POST para adicionar uma nova sala
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário para adicionar uma nova sala
    $nome_sala = $_POST['nome_sala'];
    $data_hora = $_POST["data_hora"];

    // Prepara a consulta SQL para inserir os dados na tabela 'Agendamento_da_sala'
    $sql = "INSERT INTO Agendamento_da_sala (nome_sala, data_hora) VALUES (?, ?)";

    // Prepara a instrução SQL
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Vincula os parâmetros
        $stmt->bind_param('ss', $nome_sala, $data_hora);

        // Executa a instrução SQL
        $stmt->execute();

        // Verifica se a inserção foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            // Redireciona de volta para a página de agendamento após a inserção bem-sucedida
            header("Location: Agendamento_da_sala.php");
            exit; // Termina o script para garantir que a execução pare aqui
        } else {
            // Caso contrário, exibe uma mensagem de erro
            echo "Erro ao tentar adicionar sala";
        }

        // Fecha a instrução preparada
        $stmt->close();
    } else {
        // Se a preparação da consulta falhar, exibe uma mensagem de erro
        echo "Erro na preparação da consulta: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}

// Verifica se uma solicitação GET para excluir uma sala foi feita
if (isset($_GET['excluir_id']) && is_numeric($_GET['excluir_id'])) {
    // Obtém o ID da sala a ser excluída
    $excluir_id = $_GET['excluir_id'];

    // Prepara a consulta SQL para excluir a sala pelo ID
    $sql_excluir = "DELETE FROM Agendamento_da_sala WHERE id = ?";

    // Prepara a instrução SQL
    $stmt_excluir = $conn->prepare($sql_excluir);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt_excluir) {
        // Vincula o parâmetro ID
        $stmt_excluir->bind_param('i', $excluir_id);

        // Executa a instrução SQL para excluir a sala
        $stmt_excluir->execute();

        // Verifica se a exclusão foi bem-sucedida
        if ($stmt_excluir->affected_rows > 0) {
            // Redireciona de volta para a página de agendamento após a exclusão bem-sucedida
            header("Location: Agendamento_da_sala.php");
            exit; // Termina o script para garantir que a execução pare aqui
        } else {
            // Caso contrário, exibe uma mensagem de erro
            echo "Erro ao tentar excluir sala";
        }
    } else {
        // Se a preparação da consulta de exclusão falhar, exibe uma mensagem de erro
        echo "Erro na preparação da consulta de exclusão: " . $conn->error;
    }

    // Fecha a instrução preparada, se existir
    if ($stmt_excluir) {
        $stmt_excluir->close();
    }
}
?>;






<?php
// Inclua o arquivo de configuração do banco de dados
require_once "./config.php";

// Consulta SQL para selecionar todas as salas
$sql = "SELECT * FROM Agendamento_da_sala";
$resultado = $conn->query($sql);

// Verifica se há salas
if ($resultado->num_rows > 0) {
    // Loop através de cada sala e exiba os detalhes
    while ($sala = $resultado->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $sala['nome_sala'] . "</h5>";
        echo "<p class='card-text'>Data e Hora: " . $sala['data_hora'] . "</p>";
        // Adicione um botão para excluir a sala
        echo "<a href='Agendamento_da_sala.php?excluir_id=" . $sala['id'] . "' class='btn btn-danger'>Excluir</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Nenhuma sala encontrada.";
}

// Verifique se um ID de sala para exclusão foi passado via GET
if (isset($_GET['excluir_id'])) {
    // Obtém o ID da sala a ser excluída
    $id_sala_excluir = $_GET['excluir_id'];

    // Prepara a consulta SQL para excluir a sala
    $sql_excluir = "DELETE FROM Agendamento_da_sala WHERE id = ?";
    $stmt_excluir = $conn->prepare($sql_excluir);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt_excluir) {
        // Vincula o parâmetro ID
        $stmt_excluir->bind_param("i", $id_sala_excluir);

        // Executa a consulta
        $stmt_excluir->execute();

        // Verifica se a exclusão foi bem-sucedida
        if ($stmt_excluir->affected_rows > 0) {
            echo "<p>Sala excluída com sucesso.</p>";
        } else {
            echo "<p>Erro ao excluir a sala.</p>";
        }

        // Fecha a instrução preparada
        $stmt_excluir->close();
    } else {
        echo "<p>Erro na preparação da consulta: " . $conn->error . "</p>";
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>


















