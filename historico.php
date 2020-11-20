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

	<head>
		
	</head>
	
	<body>
	<title>
	Histórico Reserloc
	</title>
		<style>
			.reserloc{
			font-size:30px;
			color:#008b8b;
			}
			.ufopa{
			margin-top: 50px;
			font-size:30px;
			color:#008b8b;
			}
		</style>
		<script	type="text/javascript">
			function voltar(){
				location.href="abas_visualizacao.php"
			}
		</script>
		<script>
			$(document).ready(function(){
				load_data();
				function load_data(query)
				{
					$.ajax({
						url:"php/fetch2.php",
						method:"post",
						data:{query:query},
						success:function(data)
						{
							$('#result10').html(data);
						}
					});
				}
				
				$('#hist').keyup(function(){
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
		<div class="conteudo">
			<h2 align="center" class="description description-second">Histórico de reserva de locais da <br>Universidade Federal do Oeste do Pará</h2><br><br>
			<h2 align="center" class="description description-primary">Encontre todas as reservas ja feitas na UFOPA</h2><br>
			<div class="form-group">
				<div class="input-group">
					<input type="text" name="hist" id="hist" placeholder="Digite qualquer informação sobre a reserva" class="inputnamePesq"/>&nbsp;<input type="button" onclick="return voltar()" value="voltar" class="btn btn-second">
				</div>
			</div>
			<br />
			<div id="result10"></div>
			<div style="clear:both"></div>
			<br><br>
			<div align="center">
				<!--p>&copy;2020 - Todos os direitos reservados</p><br-->
			</div>
		</div>
	</body>
</html>