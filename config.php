<?php
$dbHost = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sistema_agendamento";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_errno)
{
   echo "Erro" ;
}

else
{
    echo"Conexão efetuada com sucesso";
}
  
?>;