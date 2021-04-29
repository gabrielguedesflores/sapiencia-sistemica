<?php
session_start();
?>
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
								<li class="current"><a href="agenda.php">Agenda</a></li>
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
										<li><a href="./login/cadastro.php">Cadastrar</a></li>
									</ul>
								</li> <?php } ?>
							</ul>
						</nav>

				</div>

			<!-- Main -->
            <section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-4 col-12-narrower">
								<div id="sidebar">

									<!-- Sidebar -->

										<section>
											<h3>Horários de Atendimento</h3>
											<p>Entre as 08:30h e 18:30h (Horário de Brasília) estamos disponíveis para te antender. Caso necessário algum horário personalizado hora da agenda, contatar com antecendencia.</p>
											<footer>
												<a href="agendamento_data.php" class="button">Agende uma Consulta</a>
											</footer>
										</section>
										<?php
										include __DIR__."/../../controllers/Database.php";
										$instanciaDB = new Database();
										?>
										<section>
											<h3>Dúvidas</h3>
											<?php 
											//$_GET['question'] = 1;
											$getQuestions = $instanciaDB->MostraQuestionCategory(1);
											foreach ($getQuestions as $key) { ?>
											<ul class="links">

												<?php echo "<li><a target='_blank' href='index.php?pagina=duvidas-frequentes&question=$key->question_id' >$key->question_name</button></li>"; 

											}; ?>
											</ul>
											<footer><BR>
												<a href="../blog/duvidas-frequentes.php" class="button">Dúvidas Frequentes</a>
											</footer>
										</section>

								</div>
							</div>
							<div class="col-8  col-12-narrower imp-narrower">
								<div id="content">

									<!-- Content -->

										<article>
											<header>
												<h2>Marque um horário!</h2>
											</header>

											<span class="image featured"><img src="../../images/agenda - Copia.jpg" alt="" /></span>

											<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
											Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
											Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
											consequat etiam lorem ipsum dolor sit amet nullam.</p>

											<h3>And Yet Another Subheading</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac quam risus, at tempus
											justo. Sed dictum rutrum massa eu volutpat. Quisque vitae hendrerit sem. Pellentesque lorem felis,
											ultricies a bibendum id, bibendum sit amet nisl. Mauris et lorem quam. Maecenas rutrum imperdiet
											vulputate. Nulla quis nibh ipsum, sed egestas justo. Morbi ut ante mattis orci convallis tempor.
											Etiam a lacus a lacus pharetra porttitor quis accumsan odio. Sed vel euismod nisi. Etiam convallis
											rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien.
											Donec sagittis massa et leo semper a scelerisque metus faucibus. Morbi congue mattis mi.
											Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum commodo luctus.</p>

											<p>Phasellus odio risus, faucibus et viverra vitae, eleifend ac purus. Praesent mattis, enim
											quis hendrerit porttitor, sapien tortor viverra magna, sit amet rhoncus nisl lacus nec arcu.
											Suspendisse laoreet metus ut metus imperdiet interdum aliquam justo tincidunt. Mauris dolor urna,
											fringilla vel malesuada ac, dignissim eu mi. Praesent mollis massa ac nulla pretium pretium.
											Maecenas tortor mauris, consectetur pellentesque dapibus eget, tincidunt vitae arcu.
											Vestibulum purus augue, tincidunt sit amet iaculis id, porta eu purus.</p>
										</article>
										<a href="agendamento_data.php" class="button">Agende uma Consulta</a>

								</div>
							</div>
						</div>
					</div>
				</section>

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