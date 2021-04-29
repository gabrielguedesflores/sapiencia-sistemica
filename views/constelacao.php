<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sapiência Sistêmica</title>
		<link rel="shortcut icon" href="../images/simbolo-cinza-sem-fundo.jpg" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
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

                            <div style='z-index: 1';><img src="../images/logo.png" width="500px" alt=""></a></div></h1>

					</div>	

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../index.php">Inicio</a></li>
								<li><a href="agenda/agenda.php">Agenda</a></li>
								<li class="current"><a href="constelacao.php">Constelação</a></li>
								<li><a href="coaching.php">Coaching</a></li>
								<li>
									<a href="">Conteúdo</a>
									<ul>
										<li><a href="blog/duvidas-frequentes.php">Dúvidas Frequentes</a></li>
										<li><a href="blog/blog.php">Blog</a></li>
									</ul>
								</li>
								<li><a href="sobre.php">Sobre Nós</a></li>
								<?php
									if (isset($_SESSION["login"])) {
								?>
								<li>
									<a href="#">Olá, <?php echo $_SESSION["login"]->user_name;?>!&nbsp;</a>
									<ul>
										<li><a href="login/editar_conta.php">Conta</a></li>
										<li><a href="login/sessionunset.php">Sair</a></li>
									</ul>
								</li>
								<?php }else{ ?> 

								<li>
									<a href="#">Login</a>
									<ul>
										<li><a href="login/login.php">Entrar</a></li>
										<li><a href="login/cadastro.php">Cadastrar</a></li>
									</ul>
								</li> <?php } ?>
							</ul>
						</nav>

				</div>

<!-- Main -->
<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-8 col-12-narrower">
								<div id="content">

									<!-- Content -->

										<article>
											<header>
												<h2>Constelações</h2><br>
												<p>Sidebar on the right, content on the left.</p>
											</header>

											<span class="image featured"><img src="../images/constelacao5.jpg" alt="" /></span>

											<p>Questões mal resolvidas e mágoas acumuladas entre parentes, mesmo envolvendo aqueles que já partiram há tempos, podem gerar dor, sofrimento e ruídos nos relacionamentos que atravessam gerações. Para romper esse ciclo penoso, muitos defendem que a técnica da Constelação Familiar Sistêmica pode ser um recurso benéfico, rápido e eficiente. Mas afinal, o que é isso? Entenda melhor como esse método funciona e como ele atua para melhorar a comunicação entre pessoas que se ama, mas às vezes não conseguem se entender.</p>

											<h3>O que é a constelação familiar?</h3><br>
											<p>A constelação familiar é uma prática considerada terapêutica que busca resolver conflitos familiares que atravessam gerações. Num primeiro olhar, a técnica tem conteúdos parecidos aos do psicodrama, por conta da dramatização de situações, e da psicoterapia breve, pela ação rápida. A dinâmica pode ser feita em grupo ou individualmente. Durante a sessão são recriadas cenas que envolvam os sentimentos e sensações que o constelado sente sobre sua família. Nas sessões em grupo, são os voluntários e participantes que vivem essas cenas. Já nas sessões individuais podem ser usados esculturas de bonecos ou quaisquer outros recursos disponíveis - setas, pedras, adesivos, âncoras de solo.</p>

											<p>A constelação familiar é uma prática considerada terapêutica que busca resolver conflitos familiares que atravessam gerações. Num primeiro olhar, a técnica tem conteúdos parecidos aos do psicodrama, por conta da dramatização de situações, e da psicoterapia breve, pela ação rápida. A dinâmica pode ser feita em grupo ou individualmente. Durante a sessão são recriadas cenas que envolvam os sentimentos e sensações que o constelado sente sobre sua família. Nas sessões em grupo, são os voluntários e participantes que vivem essas cenas. Já nas sessões individuais podem ser usados esculturas de bonecos ou quaisquer outros recursos disponíveis - setas, pedras, adesivos, âncoras de solo.</p>
										</article>

								</div>
							</div>
							<div class="col-4 col-12-narrower">
								<div id="sidebar">
										<?php
										include "../controllers/Database.php";
										?>
									<!-- Sidebar -->

										<section>
										<?php 
											$instanciaDB = new Database();
                                            $getBlogEspecifico = $instanciaDB->MostraBlogEspecifica(9);
                                            echo "<h3>$getBlogEspecifico->blog_name</h3>";
                                            echo "<p>$getBlogEspecifico->blog_desc</p>";

                                        ?>
											<footer>
												<a href="#" class="button"></a>
											</footer>
										</section>
										
										<section>
											<h3>Dúvidas</h3>
											
											<?php
											
												$instanciaDB = new Database();
												$questions_category_id = 3;
												$getQuestions = $instanciaDB->MostraQuestionCategory($questions_category_id);
												foreach ($getQuestions as $key) { ?> 
													<ul class="links"> <?php
													echo "<li><a target='_blank' href='index.php?pagina=duvidas-frequentes&question=$key->question_id'>$key->question_name</a></li>";

											}; ?>
											</ul><Br>
											<footer>
												<a href="?pagina=duvidas-frequentes" class="button">Dúvidas Frequentes</a>
											</footer>
										</section>

										<section>
											<h3>Blog</h3>
											<ul class="links">
												<li><a href="#">Como isso pode me ajudar no trabalho?</a></li>
												<li><a href="#">Como eu sei que preciso?</a></li>
												<li><a href="#">O que é?</a></li>
												<li><a href="#">Quantas constelações existem?</a></li>
												<li><a href="#">Qual é a mais eficáz?</a></li>
												<li><a href="#">Semper mod quisturpis nisi</a></li>
											</ul>
											<footer>
												<a href="?pagina=blog" class="button">Conteúdo</a>
											</footer>
										</section>

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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>
