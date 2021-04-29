<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dúvidas - Sapiência Sistêmica</title>
    <link rel="shortcut icon" href="../images/simbolo-cinza-sem-fundo.jpg" />
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Painel Administrativo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="dashboard.php">Consultas</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="clientes.php">Clientes</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="carteira.php">Carteira</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="duvidas.php">Dúvidas</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="blog.php">Blog</a>

              </ul>
            </div>
          </div>
        </nav>
     
<?php 

include "../controllers/Database.php";
$instanciaDB = new Database();
$getDuvidas = $instanciaDB->MostraQuestions();
?>
    <br>
    <p class="fs-3" style="text-align: center;">Dúvidas Cadastrados</p>
    <br>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                
                <th>Dúvida</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getDuvidas as $key) { 
                    
                echo "<tr>";
                echo "<td>".$key->question_name."</td>";
                echo "<td>".$key->question_desc."</td>";
                echo "</tr>";
            } ?>
            
        </tbody>
        <tfoot>
            <tr>
                
                <th>Dúvida</th>
                <th>Resposta</th>
            </tr>
        </tfoot>
    </table>



<br><br>
<form method="POST" action="../controllers/CriaDuvida.php">
    <h3 style="text-align: center;">Cadastre uma dúvida</h3><br>
    <div style=" text-align: center;">

        <div class="mb-3">
            <label for="question_name" class="form-label">Dúvida</label>
            <input type="text" class="form-control" id="question_name" name="question_name" placeholder="Qual é a dúvida?" required>
        </div>

        <div class="mb-3">
            <label for="question_desc" class="form-label">Resposta da Dúvida</label>
            <textarea class="form-control" id="question_desc" name="question_desc" rows="3" placeholder="Digite a resposta" required></textarea>
        </div>

        <label for="questions_category_id" class="form-label">Categoria da Dúvida</label>
        <select id="questions_category_id" name="questions_category_id" class="form-control" required>
            <option value="1">1 - Dúvidas Agenda</option>
            <option value="2">2 - Dúvidas sobre a Conta</option>
            <option value="3">3 - Dúvidas Constelação</option>
            <option value="4">4 - Dúvidas Coaching</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>


<br><br><br>
<footer>
    <div class="card text-center">
    <div class="card-header">
        Sapiência Sistêmica 
    </div>
    <div class="card-body">
        <h5 class="card-title">Painel Administrativo</h5>
    </div>
      <div class="card-footer text-muted">
        &copy; Gabriel Guedes Flores - Todos os Direitos Reservados.
      </div>
    </div>

</footer>

    <!-- jQuery (necessário para os plugins Javascript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Inclua todos os plugins compilados (abaixo), ou inclua um por um quando for necessário -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
		  $(document).ready(function() {
		    $('#example').DataTable();
      } );
    </script>
    <script>
				<?php if(isset($_SESSION['cria_duvida'])){?>

						alert('<?php 
							echo $_SESSION["cria_duvida"]; 
							unset( $_SESSION["cria_duvida"]);

						}?>')

			</script>
  <br><br>
  </body>
</html>
