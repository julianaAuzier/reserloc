<?php
	session_start();
	include "php/conecta_banco.php";
?>
<html lang="pt-br">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RESERLOC</title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/estilo3.css">
	
	<style>
	  .cont{
		margin-top:20px;
		border: #f8f8ff;
	  }
	</style>
	
	<head>
		
	</head>
	
	<body>
	<title>
	Contate-nos
	</title>
	<script	type="text/javascript">
				function voltar(){
					location.href="abas_visualizacao.php"
				}
	</script>
		<div class="cont" align="center"><br><br><br><br><br>
		<h2 class="decription description-second">Contate-nos</h2>
		<br>
			<form name="contate" id="contate" action="php/contate2.php" method="POST"><br/>
				<h2 class="description description-primary">Digite sua mensagem<h2><br/>
					<textarea type="text" name="mensagem" id="mensagem" class="inputext" placeholder=" Sua sugestão/reclamação aqui"></textarea><br/>
					<table>
						<tr>
							<td>
								<input type="submit" class="btn btn-second" onclick="return vercont()"></button><br/>
							</td>
							<td>
								<input type="button" onclick="return voltar()" value="voltar" class="btn btn-second">
							</td>
						</tr>
					</table>
			</form><br>
			<!--<footer class="footer"><br>
				<p>&copy;2020 - Juliana Auzier</p><br>
			</footer-->
		</div>
	</body>
</html>