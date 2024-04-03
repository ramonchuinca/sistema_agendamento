<?php
  require_once ".././config.php";

  $id = $_GET['id'];

  $sql = "SELECT id, nome, capacidade, recursos, status FROM sala WHERE id = " . $id;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($salas = $result->fetch_assoc()) {
      $id = $salas['id'];
      $nome = $salas['nome'];
      $capacidade = $salas['capacidade'];
      $recursos = $salas['recursos'];
      $status = $salas['status'];
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="text-center">Editar sala</h3>
              </div>
              <div class="card-body">
                <form action="Editar.php" method="POST">
                  <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" />
                  <div class="form-group">
                    <label for="nome">nome</label>
                    <input type="text" class="form-control" name="nome"id="name"placeholder="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="recursos">recursos</label>
                    <input type="text" class="form-control" id="recursos" name="recursos" placeholder="recursos" value="<?php echo htmlspecialchars($recursos); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="capacidade">capacidade</label>
                    <input type="number" class="form-control"  name="capacidade"  id="capacidade" aria-describedby="capacidade" value="<?php echo htmlspecialchars($capacidade); ?>" placeholder="capacidade" required>
                  </div>
                  <div class="form-group">
                    <label for="status">status</label>
                    <input type="checkbox" name="status" id="status" value="1" <?php echo ($status == 1) ? 'checked="checked"' : ''; ?>>
                  </div>
                  <button type="submit"  id="submit-btn" class="btn btn-primary btn-block mt-3">Salvar</button>
                  <a href="Lista.php" class="btn btn-secondary btn-block mt-3">Cancelar</a>
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





   