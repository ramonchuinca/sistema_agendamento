<?php
require_once "./config.php";

$nome = $_POST['nome'];
$telefone = $_POST["telefone"];
$email = $_POST["email"];

$sql = "INSERT INTO sistema_agendamento (nome, telefone, email) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $nome, $telefone, $email);
$stmt->execute();

// Verificando se a inserção foi bem-sucedida
if ($stmt->affected_rows > 0) {
    header("Location: /Login.html");
} else {
    echo "Erro ao tentar adicionar usuário";
}

$stmt->close();
$conn->close();

header("location:./Login.html");
?>;

<?php
header("location:./Agendamento_da_sala.php");

?>;

