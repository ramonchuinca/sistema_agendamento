<?php
  require_once ".././config.php";
  $sql = "SELECT A.id, A.organizador, A.assunto, A.participantes, H.id horarioId, H.data, H.horaInicial, H.horaFinal, S.nome sala, S.capacidade FROM agenda A JOIN horario H ON A.horarioId = H.id JOIN sala S ON S.id = H.salaId";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Agendamentos</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3>
                  <label class="text-center">Agendamentos realizados</label>
                </h3>                
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Organizador</th>
                      <th scope="col">Assunto</th>
                      <th scope="col">Participantes</th>
                      <th scope="col">Sala</th>
                      <th scope="col">Data</th>                      
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if ($result->num_rows > 0) {
                      while ($agendas = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $agendas['organizador'] . "</td>";
                        echo "<td>" . $agendas['assunto'] . "</td>";
                        echo "<td>" . $agendas['participantes'] . "/" . $agendas['capacidade'] . "</td>";
                        echo "<td>" . $agendas['sala'] . "</td>";
                        echo "<td>" . $agendas['data'] . " " . $agendas['horaInicial'] . " " . $agendas['horaFinal'] . "</td>";
                        echo "<td>" . 
                                "<a href=\"AgendaExcluir.php?agendaId=" . $agendas['id'] . "&horarioId=" . $agendas['horarioId'] . "\" class=\"btn btn-danger\">Excluir</a> " .
                              "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan=\"6\" class=\"text-center\">Não há agendas cadastradas</td></tr>";
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