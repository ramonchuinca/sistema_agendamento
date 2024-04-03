<?php
  require_once ".././config.php";
  $sql = "SELECT id, nome, capacidade, recursos, status FROM sala";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Salas</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3>
                  <label class="text-center">Salas</label>
                  <a href="Criar.html" class="btn btn-primary pull-right">Nova</a>
                </h3>                
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Capacidade</th>
                      <th scope="col">Recursos</th>
                      <th scope="col">Disponivel</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if ($result->num_rows > 0) {
                      while ($salas = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope=\"row\">" . $salas['id'] . "</th>";
                        echo "<td>" . $salas['nome'] . "</td>";
                        echo "<td>" . $salas['capacidade'] . "</td>";
                        echo "<td>" . $salas['recursos'] . "</td>";
                        echo "<td>" . ($salas['status'] == 1 ? "Disponível" : "Indisponível") . "</td>";
                        echo "<td>" . 
                                "<a href=\"Horario.php?salaId=" . $salas['id'] . "\" class=\"btn btn-success\">Horários</a> " . 
                                "<a href=\"Edit.php?id=" . $salas['id'] . "\" class=\"btn btn-warning\">Editar</a> " . 
                                "<a href=\"Excluir.php?id=" . $salas['id'] . "\" class=\"btn btn-danger\">Excluir</a> " .
                              "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan=\"6\" class=\"text-center\">Não há salas cadastradas</td></tr>";
                    }

                    $conn->close();
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Bootstrap JS and dependencies -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>