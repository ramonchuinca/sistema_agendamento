<?php
    require_once "./config.php";

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT email, nome FROM usuario WHERE email = '" . $email . "' AND senha = '" . $senha . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: /sistema_agendamento/Home.html");
    } else {
        header("Location: /sistema_agendamento/Index.html");
    }
   
    $conn->close();
?>;