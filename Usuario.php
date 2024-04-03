<?php
require_once "./config.php";

$nome = $_POST['nome'];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "INSERT INTO usuario (nome, telefone, email, senha) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss', $nome, $telefone, $email, $senha);
$stmt->execute();

// Verificando se a inserção foi bem-sucedida
if ($stmt->affected_rows > 0) {
    $stmt->close();
    $conn->close();
    header("Location: /sistema_agendamento/Index.html");
} else {
    echo "Erro ao tentar adicionar usuário";
}

?>;