<!DOCTYPE html>

<?php
include "php/conecta_banco.php"
?>

<html>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>RESERLOC</title>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/estilo3.css">
	<head>
		  
	</head>

	<body>

		<nav>
			<img src="css/ufopa.jpg" class="ufopa">
		</nav>

	<script type="text/javascript">
				function irparalogin(){
					location.href="formulario_logar_css.php"
				}
	</script>
	
	<script type="text/javascript">
				function vercont(){
					var x = document.forms["contate"]["usuario"].value;
					  var y = document.forms["contate"]["mensagem"].value;
					  
					  if (x == "") {
						alert("Preencha todos os campos");
						return false;
					  }
					  if (y == "") {
						alert("Preencha todos os campos");
						return false;
					}
				}
	</script>
		<nav class="nav_tabs">
			<ul>
<!------------------------------------------------------ENTRAR----------------------------------------------------------------->
			<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab10">
					<label for="tab10" class="lab1" onclick="irparalogin()">Entrar</label>
					<div class="content">
						<div class="conteudo" align="center">
							<p class="info3"> Aguarde um instante por favor.<br>Você será redirecionado para entrar ou fazer seu cadastro.</p>
							<p class="info3"> Se você não foi redirecionado clique no botão abaixo</p>
							<input type="button" value="Entrar" class="btn btn-second" onclick="irparalogin()" align="right">
						</div>
					</div>
				</li>
<!------------------------------------------------------CONTATE-NOS----------------------------------------------------------------->
				<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab9">
					<label for="tab9" class="lab1">Contate-nos</label>
					<div class="content">
						<div class="conteudo">
							<form name="contate" id="contate" action="php/contate.php" method="POST" align="center">
								<h2 class="description description-primary">Digite sua mensagem<h2><br/>
									<textarea type="text" name="mensagem" id="mensagem" class="inputext" placeholder=" Sua sugestão/reclamação aqui" maxlength="40"></textarea><br/><br/>
								<h2 class="description description-primary">Seu email<h2><br/>
									<input type="email" class="inputname" name="usuario" id="usuario" maxlength="90"><br/><br/>
								<input type="submit" class="btn btn-second" onclick="return vercont()"></button><br/><br/>
							</form>
							<!--<footer>
								<p>Copyright &copy;2020 | <a href="juliana.auzier.s@gmail.com">Juliana Auzier </a></p><br>
							</footer>-->
						</div>
					</div>
				</li>
<!-------------------------------------------------------------------------------------RESERVAS--------------------------------------------------------------------------------------------------->
			<script>
			$(document).ready(function(){
				load_data();
				function load_data(query)
				{
					$.ajax({
						url:"php/fetch3.php",
						method:"post",
						data:{query:query},
						success:function(data)
						{
							$('#result').html(data);
						}
					});
				}
				
				$('#search_text').keyup(function(){
					var search = $(this).val();
					if(search != '')
					{
						load_data(search);
					}
					else
					{
						load_data();			
					}
				});
			});
			</script>
				<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab8" checked>
					<label for="tab8" class="lab1">Reservas</label>
					<div class="content">
						<div class="conteudo"><br>
							<!--input type="button" value="Entrar" class="btn btn-second" onclick="irparalogin()" align="right"-->
							<h2 align="center" class="description description-second">Encontre locais reservados</h2><br />
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="search_text" id="search_text" placeholder="Digite qualquer informação sobre a reserva" class="inputnamePesq"/>
								</div>
							</div>
							<br />
							<div id="result"></div>
						</div>
						<div style="clear:both"></div><br><br><br>
					</div>
				</li>
<!------------------------------------------------------LOGO----------------------------------------------------------------->
				<li align="left">
					<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<img src="css/Imagem4.png" align="left" class="logo"><br>
					</label>
				</li>
			</ul>
		</nav>
	</body>
</html>