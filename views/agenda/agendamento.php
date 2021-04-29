<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sapiência Sistêmica</title>
		<link rel="shortcut icon" href="../../images/simbolo-cinza-sem-fundo.jpg" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	</head>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<style>			
				/*Esconde a dive de classe Overlay caso seja identificado que o width Mobile maximo deseja igual ou menor que 980px*/
				@media only screen and (max-width: 980px){
					.overlay { display: none; }
				}
			</style>
				<div id="header">

					<!-- Logo - código abaixo no style é para esconder a logo caso a visualização seja no mobile-->
					<div class="overlay">
						<h1><a href="../../index.php" id="logo" style="@media only screen and (max-width: 980px){
						.overlay { display: none; }}">

                            <div style='z-index: 1';><img src="../../images/logo.png" width="500px" alt=""></a></div></h1>

					</div>	

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../../index.php">Inicio</a></li>
								<li class="current"><a href="views/agenda/agenda.php">Agenda</a></li>
								<li><a href="../constelacao.php">Constelação</a></li>
								<li><a href="../coaching.php">Coaching</a></li>
								<li>
									<a href="">Conteúdo</a>
									<ul>
										<li><a href="../blog/duvidas-frequentes.php">Dúvidas Frequentes</a></li>
										<li><a href="../blog/blog.php">Blog</a></li>
									</ul>
								</li>
								<li><a href="../sobre.php">Sobre Nós</a></li>
								<?php
									if (isset($_SESSION["login"])) {
								?>
								<li>
									<a href="#">Olá, <?php echo $_SESSION["login"]->user_name;?>!&nbsp;</a>
									<ul>
										<li><a href="../login/editar_conta.php">Conta</a></li>
										<li><a href="../login/sessionunset.php">Sair</a></li>
									</ul>
								</li>
								<?php }else{ ?> 

								<li>
									<a href="#">Login</a>
									<ul>
										<li><a href="../login/login.php">Entrar</a></li>
										<li><a href="../login/cadastro.php">Cadastrar</a></li>
									</ul>
								</li> <?php } ?>
							</ul>
						</nav>

				</div>
				
<?php
	
	
	//session_start();	
	include "../../controllers/Database.php";
	$instanciaDb1 = new Database();
	$scheduleType = $instanciaDb1->MostraScheduleType();
	$availableTimes = $instanciaDb1->MostraAvailableTimes();
	
	$getNames = $_SESSION["login"];
	$schedule_date = $_SESSION["schedule_date"];
	$getName = $getNames->user_name;
	$getLastName = $getNames->user_lastname;
	$getUserId = $getNames->user_id;
	$horariosDisponiveis = $instanciaDb1->MostraHorariosLivres($schedule_date);
	//echo $ano;


?>

<div class="div_agenda" style="height: 800px; padding: 10px; padding-left: 70px; padding-right: 70px; text-align: center;">
	
	<h3>Agende sua Consulta</h3><br>
	<form method="POST" action="../../controllers/CadastraAgenda.php">

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="schedule_date">Data selecionada</label>
				<input type="date" class="form-control" id="schedule_date" name="schedule_date" value="<?php echo $_SESSION["schedule_date"]; ?>" disabled="disabled" required>
			</div>
			<?php ?>
			<div class="form-group col-md-6">

				<label for="available_time">Horários Disponíveis</label>
					<select id="available_time_desc" name="available_time" class="form-control" required>
						<?php foreach ($horariosDisponiveis as $key) {
							echo "<option value=".$key->available_time_id.">$key->available_time_desc</option>";
						}?>
						
					</select>
			</div>

			<div class="form-group col-md-6">
				<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $getUserId; ?> ">
				<label for="user_name">Primeiro Nome</label>
				<input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $getName; ?> " placeholder="Primeiro Nome" disabled="disabled" required>
			</div>	

			<div class="form-group col-md-6">
				<label for="user_lastname">Últimos Nomes</label>
				<input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $getLastName; ?>" placeholder="Últimos Nomes" disabled="disabled" required>	
			</div>	

			 <div class="form-group col-md-12">
				<label for="schedule_type_desc">Tipo de Consulta</label>
					<select id="schedule_type" name="schedule_type" class="form-control" required>
					<?php foreach ($scheduleType as $key) {
							echo "<option value=".$key->schedule_type_id.">$key->schedule_type_desc - R$$key->schedule_type_value</option>";
						}?>
					</select>
			</div>
			
			<br>		
		</div>	
		<div id="info_agendamento" >
			<p>*Ao agendar uma consulta, a solicitação fica como "Pendente de Aprovação" até aprovarmos. Você reberá informações no e-mail.</p>
			<p>*O pagamento é feito via PIX. A chave você também receberá no e-mail.</p>
			<p>*Se surgir alguma dúvida sobre as consultas, nos envie uma mensagem <a href="#cta">clicando aqui</a>.</p>
		</div>
		<br>
		<button type="submit" class="button alt">Agendar</button>

    </form>
</div>
<!-- CTA -->
<section id="cta" class="wrapper style3">
					<div class="container">
						<header>
							<h2>Alguma sugestão? Nos mande uma mensagem!</h2>
							<a href="#" class="button">Enviar mensagem</a>
						</header>
					</div>
				</section>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">
							<section class="col-3 col-6-narrower col-12-mobilep">
								<h3>Dúvidas</h3>
								<ul class="links">
									<li><a href="#">Mattis et quis rutrum</a></li>
									<li><a href="#">Suspendisse amet varius</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum accumsan dolor</a></li>
									<li><a href="#">Mattis rutrum accumsan</a></li>
									<li><a href="#">Suspendisse varius nibh</a></li>
									<li><a href="#">Sed et dapibus mattis</a></li>
								</ul>
							</section>
							<section class="col-3 col-6-narrower col-12-mobilep">
								<h3>Recomendado</h3>
								<ul class="links">
									<li><a href="#">Duis neque nisi dapibus</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum accumsan sed</a></li>
									<li><a href="#">Mattis et sed accumsan</a></li>
									<li><a href="#">Duis neque nisi sed</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum amet varius</a></li>
								</ul>
							</section>
							<section class="col-6 col-12-narrower">
								<h3>Envie sua Mensagem</h3>
								<form>
									<div class="row gtr-50">
										<div class="col-6 col-12-mobilep">
											<input type="text" name="name" id="name" placeholder="Nome" />
										</div>
										<div class="col-6 col-12-mobilep">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
										<div class="col-12">
											<textarea name="message" id="message" placeholder="Mensagem" rows="5"></textarea>
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" class="button alt" value="Enviar Mensagem" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>

					<!-- Icons -->
						<ul class="icons">
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
						</ul>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>&copy; Sapiência Sistêmica. Todos os Direitos Reservados</li><li>Design: <a href="#">Gabriel Guedes Flores</a></li>
							</ul>
						</div>

				</div>

		</div>

		<!-- Scripts -->
			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/jquery.dropotron.min.js"></script>
			<script src="../../assets/js/browser.min.js"></script>
			<script src="../../assets/js/breakpoints.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>

	</body>
</html>




