<?php 
session_start();
?> 

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sapiência Sistêmica</title>
		<link rel="shortcut icon" href="images/simbolo-cinza-sem-fundo.jpg" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
						<h1><a href="index.php" id="logo" style="@media only screen and (max-width: 980px){
						.overlay { display: none; }}"><div style='z-index: 1';><img src="images/logo.png" width="500px" alt=""></a></div></h1>
					</div>	

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.php">Inicio</a></li>
								<li><a href="views/agenda/agenda.php">Agenda</a></li>
								<li><a href="views/constelacao.php">Constelação</a></li>
								<li><a href="views/coaching.php">Coaching</a></li>
								<li>
									<a href="">Conteúdo</a>
									<ul>
										<li><a href="views/blog/duvidas-frequentes.php">Dúvidas Frequentes</a></li>
										<li><a href="views/blog/blog.php">Blog</a></li>
									</ul>
								</li>
								<li><a href="views/sobre.php">Sobre Nós</a></li>
								<?php
									if (isset($_SESSION["login"])) {
								?>
								<li>
									<a href="#">Olá, <?php echo $_SESSION["login"]->user_name;?>!&nbsp;</a>
									<ul>
										<li><a href="views/login/editar_conta.php">Conta</a></li>
										<li><a href="views/login/sessionunset.php">Sair</a></li>
									</ul>
								</li>
								<?php }else{ ?> 

								<li>
									<a href="#">Login</a>
									<ul>
										<li><a href="views/login/login.php">Entrar</a></li>
										<li><a href="views/login/cadastro.php">Cadastrar</a></li>
									</ul>
								</li> <?php } ?>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
				<section id="banner">
					<header>
						<h2><em>Encontre o plano perfeito para você! </em></h2>
					</header>
				</section>

			<!-- Highlights -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<i class="icon solid major featured fa fa-child"></i>
									<h3>Constelação</h3>
									<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.</p>
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<i class="icon solid major featured fa fa-calendar"></i>
									<h3>Agendamento</h3>
									<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.</p>
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<i class="icon solid major featured fa fa-star"></i>
									<h3>Coaching</h3>
									<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.</p>
								</div>
							</section>
						</div>
					</div>
				</section>

			<!-- Gigantic Heading -->
				<section class="wrapper style2">
					<div class="container">
						<header class="major">
							<h2>Realização Pessoal, Profissional e Familiar</h2>
						<!--	<p>Totalmente online e personalizado para você!</p> -->
						</header>
					</div>
				</section>

			<!-- Posts -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row">
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/constelacao1.jpg" alt="consteção familiar" /></a>
									<div class="inner">
										<h3>O que é Constelação?</h3>
										<p>É uma nova abordagem da Psicoterapia Sistêmica Fenomenológica criada e desenvolvida pelo ex padre alemão Bert Hellinger. <a href="views/constelacao.php"> Ler mais</a></p>
									</div>
								</div>
							</section>
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/constelacao3.jpg" alt="constelacao"/></a>
									<div class="inner">
										<h3>Constelação nas Organizações</h3>
										<p>As organizações encontram diversos problemas: elas não crescem, não se desenvolvem, os clientes não são fiéis ou não voltam.<a href="?pagina=blog&blog=9"> Ler mais</a></p>
									</div>
								</div>
							</section>
						</div>
						<div class="row">
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/coaching.jpg" alt="coaching sistêmico"/></a>
									<div class="inner">
										<h3>Coaching de Vida</h3>
										<p>O Coaching de Vida ajuda as pessoas a conquistarem seus objetivos pessoais, que levam à satisfação e realização nas diversas.<a href="?pagina=blog&blog=10"> Ler mais</a></p>
									</div>
								</div>
							</section>
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/coaching2.jpg" alt="coaching"/></a>
									<div class="inner">
										<h3>Coaching para Lideranças</h3>
										<p>Esta modalidade de coaching está direcionado a Gerentes, Supervisores, Coordenadores e profissionais que desejam melhorar suas habilidades. <a href="?pagina=blog&blog=11">Ler mais</a></p>
									</div>
								</div>
							</section>
						</div>
					</div>
				</section>

			<!-- CTA -->
				<section id="cta" class="wrapper style3">
					<div class="container">
						<header>
							<h2>Alguma sugestão? Nos mande uma mensagem!</h2>
							<a href="#cta" class="button">Enviar mensagem</a>
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
								<form method="POST" action="controllers/EnviaEmailCTA.php">
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>

						$(document).ready(function() {
						    $('#example').DataTable();
						} );

				<?php if(isset($_SESSION["cadastro"])){?>

				 		alert('<?php 
							echo $_SESSION["cadastro"]; 
							unset( $_SESSION["cadastro"]);

				 		}?>')
			</script>
			<script>
				<?php if(isset($_SESSION['resultLogin'])){?>

						alert('<?php 
							echo $_SESSION["resultLogin"]; 
							unset( $_SESSION["resultLogin"]);

						}?>')

			</script>
			<script>
				<?php if(isset($_SESSION['update_senha_success'])){?>

						alert('<?php 
							echo $_SESSION["update_senha_success"]; 
							unset( $_SESSION["update_senha_success"]);

						}?>')

			</script>

	</body>
</html>