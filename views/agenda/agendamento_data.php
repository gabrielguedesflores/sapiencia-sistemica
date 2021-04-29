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
								<li><a href="views/constelacao.php">Constelação</a></li>
								<li><a href="views/coaching.php">Coaching</a></li>
								<li>
									<a href="views/conteudo/conteudo.php">Conteúdo</a>
									<ul>
										<li><a href="#">Conteúdos</a></li>
										<li><a href="#">Dúvidas Frequentes</a></li>
										<li><a href="#">Blog</a></li>
									</ul>
								</li>
								<li><a href="no-sidebar.html">Sobre Nós</a></li>
								<li>
									<a href="#">Login</a>
									<ul>
										<li><a href="#">Entrar</a></li>
										<li><a href="#">Cadastrar</a></li>
									</ul>
								</li>
							</ul>
						</nav>

				</div>
                
                <?php

//ENVIA A DATA PARA O CONTROLLER GetDataSendSchedule E ENVIA PARA O AGENDAMENTO

	if(!isset($_SESSION["login"])){
	echo "<div style='text-align: center;' </div>";
	echo "<br><br><br>";
	echo "<h3>Faça o login ou seu cadastro para fazer o agendamento. Vamos nos conhecer melhor! :) </h3> <br><br>";?>

	<div class="col-12">
		<ul style="float: center;">
			<BR>
			<li><a href="../login/login.php"><input type="submit" class="button alt" value="Login"/>&nbsp;&nbsp;<a href="../login/cadastro.php"><input type="submit" class="button alt" value="Cadastre-se"/></a></li>
		</ul>
	</div>
	<br><br><br>
<?php } else { ?>
<br>
</div>
<?php
	//session_start();
	//include __DIR__."/../../controllers/Database.php";
	//$instanciaDb1 = new Database();
	$ano = date("y-m-d");
	//$horariosDisponiveis = $instanciaDb1->MostraHorariosLivres($ano);
	//echo $ano;


?>

<div class="div_agenda" style="height: 500px; padding: 10px; padding-left: 70px; padding-right: 70px; text-align: center;">
	
	<h3>Agende sua Consulta</h3><br>
	<form method="POST" action="../../controllers/GetDataSendSchedule.php">

		<div class="form-row" style="display: center;">
			<div class="form-group col-md-12"> 

				<label for="schedule_date">Data</label>
				<input type="date" value = "<?php echo $ano; ?>" class="form-control" id="schedule_date" name="schedule_date" placeholer="Data" required> <br>

			</div>
					
		</div>	
		<br><br>
		<div id="info_agendamento" >
			<p>*Ao agendar uma consulta, a solicitação fica como "Pendente de Aprovação" até aprovarmos. Você reberá informações no e-mail.</p>
			<p>*O pagamento é feito via PIX. A chave você também receberá no e-mail.</p>
			<p>*Se surgir alguma dúvida sobre as consultas, nos envie uma mensagem <a href="#cta">clicando aqui</a>.</p>
		</div>
		<br>
		<button type="submit" class="button alt">Seguir com o agendamento</button><br>

    </form>
</div>

<?php }?>

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