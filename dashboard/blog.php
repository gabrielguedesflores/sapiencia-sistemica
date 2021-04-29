<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts - Sapiência Sistêmica</title>
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
$getPosts = $instanciaDB->MostraBlog();
?>
    <br>
    <p class="fs-3" style="text-align: center;">Posts Cadastrados</p>
    <br>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Assunto</th>
                <th>Conteúdo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getPosts as $key) { 
                    
                echo "<tr><td>".$key->blog_name."</td>";
                echo "<td>".$key->blog_desc."</td>";
                echo "</tr>";
            } ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Assunto</th>
                <th>Conteúdo</th>
            </tr>
        </tfoot>
    </table>



<br><br>
<form method="POST" action="../controllers/CriaPost.php">
    <h3 style="text-align: center;">Faça um Post no Blog</h3><br>
    <div style="text-align: center;">

        <div class="mb-3">
            <label for="blog_name" class="form-label">Descrição do Post</label>
            <input type="text" class="form-control" id="blog_name" name="blog_name" placeholder="Título do Post" required>
        </div>

        <div class="mb-3">
            <label for="blog_desc" class="form-label">Conteúdo</label>
            <textarea class="form-control" id="blog_desc" name="blog_desc" rows="3" placeholder="Digite o conteúdo do post" required></textarea>
        </div>

        <label for="blog_category_id" class="form-label">Categoria do Post</label>
        <select id="blog_category_id" name="blog_category_id" class="form-control" required>
            <option value="1">1 - Constelação</option>
            <option value="2">2 - Coaching</option>
            <option value="3">3 - Assuntos Variados</option>
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
				<?php if(isset($_SESSION['cria_post'])){?>

						alert('<?php 
							echo $_SESSION["cria_post"]; 
							unset( $_SESSION["cria_post"]);

						}?>')

			</script>
  <br><br>
  </body>
</html>
