

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Listagem Das Salas</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <?php
        // Suponha que você tenha uma array $salas contendo informações sobre as salas
        // O array $salas pode ser gerado a partir do banco de dados ou de outra fonte de dados
        $salas = array(
            array("id" => 1, "nome" => "Sala 1", "descricao" => "Descrição da Sala 1"),
            array("id" => 2, "nome" => "Sala 2", "descricao" => "Descrição da Sala 2"),
            array("id" => 3, "nome" => "Sala 3", "descricao" => "Descrição da Sala 3"),
            array("id" => 4, "nome" => "Sala 4", "descricao" => "Descrição da Sala 4"),
            array("id" => 5, "nome" => "Sala 5", "descricao" => "Descrição da Sala 5"),
            array("id" => 6, "nome" => "Sala 6", "descricao" => "Descrição da Sala 6"),
            array("id" => 7, "nome" => "Sala 7", "descricao" => "Descrição da Sala 7"),
            array("id" => 8, "nome" => "Sala 8", "descricao" => "Descrição da Sala 8"),
        );

        // Iterar sobre as salas e exibir cada uma em uma coluna
        foreach ($salas as $sala) {
            ?>
            <div class="col-md-3">
                <div class="card mb-3" style="width: 18rem;">
                    <img src="./img/imagens/R.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $sala['nome']; ?></h5>
                        <p class="card-text"><?php echo $sala['descricao']; ?></p>
                       
                        <div class="container mt-5">
                        <h2>Agendar Sala</h2>
                        <form action="processar.php" method="POST">
                        <div class="form-group">
                        <label for="nome_sala">Nome  Sala</label>
                        <input type="text" class="form-control" id="nome_sala" name="nome_sala" required>
                        
                       </div>
                       <div class="form-group">
                       <label for="data_hora">Data  Hora</label>
                       <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" required>
                       </div>
                       <button type="submit" id="submit-btn" class="btn btn-primary">Agendar</button>
                       <button type="submit" id=""name="action" value="excluir" class="btn btn-danger">Excluir</button>
                      
                       <script>
                           
                        document.getElementById("submit-btn").addEventListener("click", function(event) {
                        
                        event.preventDefault();
                        
                        
                        //alert("Agendado Com Sucesso!");
                        
                       
                        document.querySelector("form").submit();
                        window.location.href ="/Status_agendamento.php";
                        
                    });
                    </script>




                      </form>
                     </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php


// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $nome_sala = $_POST['nome_sala'];
    $data_hora = $_POST['data_hora'];
    
    // Consulta SQL para inserir os dados na tabela sistema_agendamento
    $sql2 = "INSERT INTO sistema_agendamento (nome_sala, data_hora) VALUES (?, ?)";

    // Preparar a consulta
    $stmt2 = $conn->prepare($sql2);
    
    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt2 === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Associar parâmetros
    $stmt2->bind_param('ss', $nome_sala, $data_hora); // 's' para string

    // Executar a consulta
    if ($stmt2->execute()) {
        echo "Dados inseridos na tabela sistema_agendamento com sucesso.";
        
    } else {
        echo "Erro ao inserir dados na tabela sistema_agendamento: " . $stmt2->error;
    }

    // Fechar a consulta
    $stmt2->close();
   
}
?>;



?>





























    <!-- Inclua o Bootstrap JS e dependências aqui -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</body>
</html>