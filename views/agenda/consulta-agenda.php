<?php 

require __DIR__."/../../controllers/Calendar.php"; 
$exibeCalendario = new Calendar();
$mesAtual = date("m"); 

?>

<table id='agenda' name="agenda" class='display' style="border = 0 cellspacing = '0' align = 'center'">
<br>
    <?php
        $exibeCalendario->MostreCalendario($mesAtual);
    ?>
</table></div></div></section>
<br>
    <section style="text-align: center;">
		<h3>Dúvidas Frequentes</h3>
		<p>Se estiver com alguma dúvida veja nossa base de dúvidas frequentes do site.<br>
           Caso não encontre o que precise nos <a href="#cta">envie uma mensagem.</a></p>
		</p>
		<footer>
            <a href="?pagina=duvidas-frequentes" class="button">Dúvidas Frequentes</a>
		</footer>
	</section>

<!-- Modal 
<button class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">
Exibir mensagem
</button>

<button class="btn btn-primary" id="btn-mensagem">Exibir modal via JavaScript</button>-->

<!-- Fim Modal-->
