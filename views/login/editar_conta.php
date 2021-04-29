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
						<h1><a href="index.php" id="logo" style="@media only screen and (max-width: 980px){
						.overlay { display: none; }}"><div style='z-index: 1';><img src="../../images/logo.png" width="500px" alt=""></a></div></h1>
					</div>	

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../../index.php">Inicio</a></li>
								<li><a href="../agenda/agenda.php">Agenda</a></li>
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

<div class="div_editar_conta" style="padding: 10px; padding-left: 70px; padding-right: 70px; text-align: center;">
	<h3>Edite seus Dados</h3><br>
	<form method="POST" action="../../controllers/UpdateDadosUsuarios.php">
  	<div class="form-row">

	  	<div class="form-group col-md-6">
		  <label>Primeiro Nome</label>
		  <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $_SESSION["login"]->user_name ?>" required>
		</div>

		<div class="form-group col-md-6">
			<label>Últimos Nomes</label>
			<input type="text" class="form-control" name="user_lastname" id="user_lastname" value="<?php echo $_SESSION["login"]->user_lastname ?>" required>
		</div>

		<div class="form-group col-md-6">
			<label>Aniversário</label>
			<input type="date" class="form-control" name="user_bday" id="user_bday" value="<?php echo $_SESSION["login"]->user_bday ?>" required>
		</div>

		<div class="form-group col-md-6">
			<label>Estado</label>
			<select name="user_state" id="user_state" class="form-control">
				<option value="">Selecione seu estado</option>
				<option value="AC">Acre</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="AM">Amazonas</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espírito Santo</option>
				<option value="GO">Goiás</option>
				<option value="MA">Maranhão</option>
				<option value="MT">Mato Grosso</option>
				<option value="MS">Mato Grosso do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PR">Paraná</option>
				<option value="PE">Pernambuco</option>
				<option value="PI">Piauí</option>
				<option value="RJ">Rio de Janeiro</option>
				<option value="RN">Rio Grande do Norte</option>
				<option value="RS">Rio Grande do Sul</option>
				<option value="RO">Rondônia</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				<option value="TO">Tocantins</option>
			</select>
		</div>

		<div class="form-group col-md-6">
			<label>E-mail</label>
			<input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $_SESSION["login"]->user_email ?>" required>
		</div>

		<div class="form-group col-md-6">
			<label>Senha</label>
			<input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Senha" required>
		</div>

		<div class="col-12">
			<ul style="float: center;">
				<input type="submit" class="button alt" value="Editar"/>
			</ul>
		</div>
	
  	</div>  
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
								<li>&copy; Sapiência Sistêmica. Todos os Direitos Reservados</li><li>Design: <a href="techapp.kinghost.net">Gabriel Guedes Flores</a></li>
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

	</body>
</html>
