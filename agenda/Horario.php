<?php
  require_once ".././config.php";

  $salaId = $_GET['salaId'];

  $sql = "SELECT id, data, horaInicial, horaFinal, reservado FROM horario WHERE data >= NOW() AND reservado = 0 AND salaId = ". $salaId;
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
         <title>Horários da sala</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3>
                  <label class="text-center">Horários disponíveis</label>
                </h3>                
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Data</th>
                      <th scope="col">Hora inicial</th>
                      <th scope="col">Hora final</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if ($result->num_rows > 0) {
                      while ($horarios = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope=\"row\">" . $horarios['id'] . "</th>";
                        echo "<td>" . $horarios['data'] . "</td>";
                        echo "<td>" . $horarios['horaInicial'] . "</td>";
                        echo "<td>" . $horarios['horaFinal'] . "</td>";
                        echo "<td>" . 
                        "<a href=\"Agenda.php?horarioId=" . $horarios['id'] . "&salaId=" . $salaId . "\" class=\"btn btn-success\">Agendar</a> " .
                              "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan=\"6\" class=\"text-center\">Não há horários cadastradas</td></tr>";
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





   