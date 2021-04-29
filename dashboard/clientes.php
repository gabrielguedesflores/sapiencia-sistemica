<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes - Sapiência Sistêmica</title>
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
$getClientes = $instanciaDB->MostraClientes();
?>
    <br>
    <p class="fs-3" style="text-align: center;">Clientes Cadastrados</p>
    <br>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>E-mail</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getClientes as $key) { 
                    
                echo "<tr><td>".$key->user_name. " " .$key->user_lastname."</td>";
                //echo "<td>".$key->user_lastname."</td>";
                echo "<td>".$key->user_bday."</td>";
                echo "<td>".$key->user_email."</td>";
                echo "<td>".$key->user_state."</td>";
                //echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#schedule_".$key->schedule_id."'>Ações</button></td></tr>";
            } ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>E-mail</th>
                <th>Estado</th>
            </tr>
        </tfoot>
    </table>

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
  <br><br>
  </body>
</html>
