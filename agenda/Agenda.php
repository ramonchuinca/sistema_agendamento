<?php
  require_once ".././config.php";

  $horario_id = $_GET['horarioId'];
  $salaId = $_GET['salaId'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
         <title>Agendar horário</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="text-center">Agendar sala</h3>
              </div>
              <div class="card-body">
                <form action="Agendar.php" method="POST">
                  <input type="hidden" id="horario_id" name="horario_id" value="<?php echo htmlspecialchars($horario_id); ?>" />
                  <div class="form-group">
                    <label for="organizador">organizador</label>
                    <input type="text" class="form-control" name="organizador"id="organizador"placeholder="organizador" required>
                  </div>
                  <div class="form-group">
                    <label for="assunto">assunto</label>
                    <input type="text" class="form-control" id="assunto" name="assunto" placeholder="assunto" required>
                  </div>
                  <div class="form-group">
                    <label for="participantes">participantes</label>
                    <input type="number" class="form-control"  name="participantes" id="participantes" aria-describedby="participantes" placeholder="participantes" required>
                  </div>
                  <button type="submit"  id="submit-btn" class="btn btn-primary btn-block mt-3">Salvar</button>
                  <a href="Horario.php?salaId=<?php echo htmlspecialchars($salaId); ?>" class="btn btn-secondary btn-block mt-3">Cancelar</a>
                </form>
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





   