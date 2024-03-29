<?php
// Inclua o arquivo de configuração do banco de dados
require_once "./config.php";

// Consulta SQL para selecionar todos os agendamentos
$sql = "SELECT * FROM Agendamento_da_sala";
$resultado = $conn->query($sql);

// Verifica se há agendamentos
if ($resultado->num_rows > 0) {
    // Exibe os detalhes de cada agendamento
    echo "<h2>Status de Agendamento</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nome da Sala</th><th>Data e Hora</th></tr>";
    while ($agendamento = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $agendamento['nome_sala'] . "</td>";
        echo "<td>" . $agendamento['data_hora'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum agendamento encontrado.";
}

// Feche a conexão com o banco de dados
$conn->close();
?>,

<!--teste para ver se vai receber os dados do agendamento-->

<?php
// Verifique se os parâmetros esperados estão definidos na URL
if(isset($_GET['nome_sala']) && isset($_GET['data_hora'])) {
    // Recupere os valores dos parâmetros
    $nomeSala = $_GET['nome_sala'];
    $dataHora = $_GET['data_hora'];

    // Aqui você pode usar $nomeSala e $dataHora conforme necessário
    echo "<h2>Status de Agendamento</h2>";
    echo "<p>Nome da Sala: $nomeSala</p>";
    echo "<p>Data e Hora: $dataHora</p>";

    // Você também pode usar esses valores para consultar o banco de dados ou realizar outras operações
} else {
    // Se os parâmetros não estiverem definidos, exiba uma mensagem de erro
    echo "Parâmetros ausentes na URL.";
}
?>

