<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Gestão - Sapiência Sistêmica</title>
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
                </li>
              </ul>
            </div>
          </div>
        </nav>
<?php
include "../controllers/Database.php";
$instanciaDB = new Database();
$getSchedulePendente = $instanciaDB->MostraAgendaPendente();
$getScheduleAprovada = $instanciaDB->MostraAgendaAprovada();
$getSchedule = $instanciaDB->MostraAgenda();
$getScheduleReprovada = $instanciaDB->MostraAgendaReprovada();

?>
    
<!--
<div class="div_dashboard" style="padding: 10px; padding-left: 70px; padding-right: 70px;">
-->

    <br>
    <p class="fs-3" style="text-align: center;">Consultas Pendentes de Aprovação</p>
    <br>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <!--<th>Código</th>-->
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Nome</th>
                <!--<th>Sobrenome</th>-->
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getSchedulePendente as $key) { 
                
                echo "<tr>";
                //echo "<td>".$key->schedule_id."</td>";
                echo "<td>".$key->schedule_date."</td>";
                echo "<td>".$key->available_time_desc."</td>";
                echo "<td>".$key->schedule_type_desc."</td>";
                echo "<td>".$key->user_name. " " .$key->user_lastname."</td>";
                //echo "<td>".$key->user_lastname."</td>";
                echo "<td>".$key->schedule_status_desc."</td>";
                //echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Ações</button></td></tr>";
                echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#schedule_".$key->schedule_id."'>Ações</button></td>";
                echo "</tr>";
            } ?>
            
        </tbody>
        <tfoot>
            <tr>
                <!--<th>Código</th>-->
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Nome</th>
                <!--<th>Sobrenome</th>-->
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </tfoot>
    </table>

  <!-- CONSULTAS APROVADAS-->
  <br><br>  
  <br>
    <p class="fs-3" style="text-align: center;">Consultas Aprovadas</p>
    <br>

    <table id="example1" class="display" style="width:100%">
        <thead>
            <tr>
                <!--<th>Código</th>-->
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Nome</th>
                <!--<th>Sobrenome</th>-->
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getScheduleAprovada as $key) { 
                
                echo "<tr>";
                //echo "<td>".$key->schedule_id."</td>";
                echo "<td>".$key->schedule_date."</td>";
                echo "<td>".$key->available_time_desc."</td>";
                echo "<td>".$key->schedule_type_desc."</td>";
                echo "<td>".$key->user_name. " " .$key->user_lastname."</td>";
                //echo "<td>".$key->user_lastname."</td>";
                echo "<td>".$key->schedule_status_desc."</td>";
                //echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Ações</button></td></tr>";
                echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#schedule_".$key->schedule_id."'>Ações</button></td>";
                echo "</tr>";
            } ?>
            
        </tbody>
        <tfoot>
            <tr>
                <!--<th>Código</th>-->
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Nome</th>
                <!--<th>Sobrenome</th>-->
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </tfoot>
    </table>

     <!-- CONSULTAS REPROVADA-->
  <br><br>  
  <br>
    <p class="fs-3" style="text-align: center;">Consultas Reprovadas</p>
    <br>

    <table id="example2" class="display" style="width:100%">
        <thead>
            <tr>
                <!--<th>Código</th>-->
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Nome</th>
                <!--<th>Sobrenome</th>-->
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getScheduleReprovada as $key) { 
                
                echo "<tr>";
                //echo "<td>".$key->schedule_id."</td>";
                echo "<td>".$key->schedule_date."</td>";
                echo "<td>".$key->available_time_desc."</td>";
                echo "<td>".$key->schedule_type_desc."</td>";
                echo "<td>".$key->user_name. " " .$key->user_lastname."</td>";
                //echo "<td>".$key->user_lastname."</td>";
                echo "<td>".$key->schedule_status_desc."</td>";
                //echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Ações</button></td></tr>";
                echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#schedule_".$key->schedule_id."'>Ações</button></td>";
                echo "</tr>";
            } ?>
            
        </tbody>
        <tfoot>
            <tr>
                <!--<th>Código</th>-->
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Nome</th>
                <!--<th>Sobrenome</th>-->
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </tfoot>
    </table>


    <!-- Modal -->
    <?php foreach ($getSchedule as $key) { ?>

      <div class="modal fade" id="schedule_<?php echo $key->schedule_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Dados da Solicitação de Consulta</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          <!-- CORPO DO MODAL -->

          <form method="POST" action="../controllers/AprovaConsulta.php">
          <input type="hidden" id="schedule_id" name="schedule_id" value="<?php echo $key->schedule_id; ?>">

            <div class="form-group form-row">
              <div class="col">
                <label  for="schedule_date">Data</label>
                <input type="text" class="form-control mb-2" id="schedule_date" readonly value="<?php echo $key->schedule_date ?>">
                <br>
              </div>

              <div class="col">
                <label for="schedule_available_times">Horário</label>
                <input type="text" class="form-control" id="schedule_available_times" readonly value="<?php echo $key->available_time_desc ?>">
                <br>
              </div>

              <div class="col">
                <label for="user_name">Nome</label>
                <input type="text" class="form-control" id="user_name" readonly value="<?php echo $key->user_name . " " . $key->user_lastname ?>">
                <br>
              </div>

              <div class="col">
                <label for="schedule_type_desc">Tipo de Consulta</label>
                <input type="text" class="form-control" id="schedule_type_desc" readonly value="<?php echo $key->schedule_type_desc ?>">
                <br>
              </div>

              <div class="col">
                <label for="schedule_status_desc">Status do Consulta</label>
                <input type="text" class="form-control" id="schedule_status_desc" readonly value="<?php echo $key->schedule_status_desc ?>">
                <br>
              </div>

            </div>
            <button type="submit" class="btn btn-success">Aprovar</button>
            <!-- FIM DO CORPO DO MODAL -->
            </div>
            </form>
            <form method="POST" action="../controllers/ReprovaConsulta.php">

              <div class="modal-footer">
                <input type="hidden" id="schedule_id" name="schedule_id" value="<?php echo $key->schedule_id; ?>">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger">Reprovar</button>
              </div>

            </form>

          </div>
        </div>
      </div>
      <?php  } ?>
      <!-- Fim Modal 
      
Data
Hora
Tipo de Consulta
Nome</th>
Sobrenome</th>
Status</th>
Ações</th>-->
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
		  $(document).ready(function() {
		    $('#example1').DataTable();
      } );
    </script>
    <script>
		  $(document).ready(function() {
		    $('#example2').DataTable();
      } );
    </script>
    
  <br><br>
  </body>
</html>
