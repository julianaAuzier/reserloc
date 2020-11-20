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
	reserloc
	</title>
	<script	type="text/javascript">
				function voltar(){
					location.href="formulario_logar_css.php"
				}
	</script>
	<script type="text/javascript">
		function esq() {
		  var a = document.forms["contate"]["usuario"].value;
		  
		  if (a == "") {
			alert("Insira seu e-mail");
			return false;
		  }
		  else
			  location.href="php/envieminhasenha.php";
		}
		</script>
		<div class="cont" align="center"><br><br><br><br><br>
		<h2 class="description description-second">Preencha com seu e-mail para receber a nova senha de acesso</h2>
		<br>
			<form name="contate" id="contate" action="php/envieminhasenha.php" method="POST"><br/>
				<h3 class="description description-primary">Qual seu e-mail de acesso ao reserloc?<h3><br/>
					<input type="email" name="usuario" id="usuario" class="inputname" placeholder=" Seu e-mail"></input><br/>
					<table>
						<tr>
							<td>
								<input type="submit" class="btn btn-second" onclick="return esq()"></button><br/>
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