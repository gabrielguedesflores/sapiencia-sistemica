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
								<li><a href="../agenda/agenda.php">Agenda</a></li>
								<li><a href="../constelacao.php">Constelação</a></li>
								<li><a href="../coaching.php">Coaching</a></li>
								<li class="current">
									<a href="#">Conteúdo</a>
									<ul>
										<li><a href="duvidas-frequentes.php">Dúvidas Frequentes</a></li>
										<li><a href="blog.php">Blog</a></li>
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

include "../../controllers/Database.php";
$instanciaDB = new Database();
if(isset($_GET['question'])){
	$getQuestionEspecifica = $instanciaDB->MostraQuestionEspecifica($_GET['question']); ?>

	<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-8 col-12-narrower">
								<div id="content">

									<!-- Content -->

										<article>
											<header>
												<h2>Dúvidas Frequentes</h2><br><br>
												<h3><?php echo $getQuestionEspecifica->question_name; ?></h3>
											</header>
                                            <br>
                                            <p><?php echo $getQuestionEspecifica->question_desc; ?></p>
										</article><br>
										<span class="image featured"><img src="../../images/question.jpg" alt="" /></span>
								</div>
							</div>
							<div class="col-4 col-12-narrower">
								<div id="sidebar">

									<!-- Sidebar -->

										<section>
                                            <h3>Mais Dúvidas</h3>
                                            <?php 
											$getQuestions = $instanciaDB->MostraQuestions();
											foreach ($getQuestions as $key) { ?>
											<ul class="links">
                                            <?php echo "<li><a href='index.php?pagina=duvidas-frequentes&question=$key->question_id' >$key->question_name</button></li>"; }?>
                                            </ul>
											
                                            <footer><a></a></footer>
										</section>

								</div>
							</div>
						</div>
					</div>
				</section> 
				
<?php

}else{ ?>
<!-- Main -->
<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-8 col-12-narrower">
								<div id="content">

									<!-- Content -->

										<article>
											<header>
												<h2>Dúvidas Frequentes</h2><br>
												<h3>Aqui você tem acesso ao nosso banco de dúvidas. Navegue pelo 
												menu à direita para encontrar sua dúvida.</h3><br>
											</header>
											<span class="image featured"><img src="../../images/curso11.jpg" alt="" /></span>
                                            <br>
                                            <p>
												Sempre que você tiver alguma dúvida, aqui é o canal para você navegar entre as dúvidas frequentes, que temos registro. Seja ao agendar consultas, horário personalizado, pagamento e etc. Caso ainda reste dúvidas, pode nos enviar utilizando o formulário abaixo no site, ou <a href="#cta">clicando aqui</a>. No lado direito, você verá nossa lista </p>
											
										</article>

								</div>
							</div>
							<div class="col-4 col-12-narrower">
								<div id="sidebar">

									<!-- Sidebar -->

										<section>
                                            <h3>Mais Dúvidas</h3>
                                            <?php 
											$getQuestions = $instanciaDB->MostraQuestions();
											foreach ($getQuestions as $key) { ?>
											<ul class="links">
                                            <?php echo "<li><a href='index.php?pagina=duvidas-frequentes&question=$key->question_id' >$key->question_name</button></li>"; }?>
                                            </ul>

											
                                            <footer><a></a></footer>
										</section>

								</div>
							</div>
						</div>
					</div>
				</section>
				<?php } ?>

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