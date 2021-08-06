<?php
	session_start();
	include "php/conecta_banco.php";
	require_once('php/conect.class.php');

	if((isset($_SESSION['email'])) and (isset($_SESSION['senha']))){
		if($_SESSION['nomeUser']!="Administrador")
			header('Location:abas_visualizacao.php');
	}
?>

<!DOCTYPE html>

<html>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RESERLOC</title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/estilo3.css">
		
	<head></head>
	<body>

		<nav>
			<img src="css/ufopa.jpg" class="ufopa">
		</nav>

		<nav class="nav_tabs">
		<meta name="viewport" content="width=device-width,initial-scale=1">
			<ul>
<!----------------------------------------------------------------------------MEUS DADOS----------------------------------------------------------------------------------------->
				<li>
					<script type="text/javascript">
					function vercont() {
					  var s = document.forms["editarAdmin"]["emailAdmin"].value;
					  if (s == "") {
						alert("Preencha todos os campos");
						return false;
					  }
					}
					</script>
					<input type="radio" name="tabs" class="rd_tabs" id="tab6">
					<label for="tab6" class="lab1">Meus dados</label>
					<div class="content">
						<div class="conteudo">
						<br/>
							<form action="php/alterar_dados_admin.php" align="center" name="editarAdmin" method="POST">
								<h2 class="description description-second">Edite seu email</h2><br>
								<p class="info">Editando o email e a senha você pode transferir<br>seu acesso como administrador para outra pessoa.</p><br>
								<input value="<?= $_SESSION['email']?>" id="emailAdmin" name="emailAdmin" class="inputname"><br>
								<input type="submit" class="btn btn-second" onclick="return emBranco()" value="editar"></button><br><br>
								<p class="info">Caso queira mudar sua senha, vá na aba de usuários <br>e clique no botão para trocar senha. Todas as senhas <br>de acesso devem ser geradas pelo sistema.</p>
							</form>
						</div>
					</div>
				</li>
<!-------------------------------------------------------------------------------------SOLICITAÇÕES--------------------------------------------------------------------------------------------------->
				<script>
				$(document).ready(function(){
					load_data();
					function load_data(query)
					{
						$.ajax({
							url:"php/fetch6.php",
							method:"post",
							data:{query:query},
							success:function(data)
							{
								$('#result4').html(data);
							}
						});
					}
					
					$('#searchS').keyup(function(){
						var search = $(this).val();
						if(search != ''){
							load_data(search);
						}
						else{
							load_data();			
						}
					});
				});
				</script>
				<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab5">
					<label for="tab5" class="lab1">Solicitações</label>
					<div class="content">
						<div class="conteudo">
						<br/>
							
							<p align="center" class="description description-second">Solicitações de acesso ao sistema</p><br><br>
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="searchS" id="searchS" placeholder="Procure alguém para permitir ou excluir" class="inputnamePesq"/>
								</div>
							</div>
							<br />
							<div id="result4"></div><br><br>
						</div>
					</div>
				</li>
<!-------------------------------------------------------------------------------------USERS--------------------------------------------------------------------------------------------------->
				<script>
				$(document).ready(function(){
					load_data();
					function load_data(query)
					{
						$.ajax({
							url:"php/fetch10.php",
							method:"post",
							data:{query:query},
							success:function(data)
							{
								$('#result2').html(data);
							}
						});
					}
					
					$('#searchU').keyup(function(){
						var search = $(this).val();
						if(search != ''){
							load_data(search);
						}
						else{
							load_data();			
						}
					});
				});
				</script>
				<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab4">
					<label for="tab4" class="lab1">Usuários</label>
					<div class="content">
						<div class="conteudo">
						<br/>
							<p align="center" class="description description-second">Usuários com acesso interno ao sistema</p><br><br>
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="searchU" id="searchU" placeholder="Procure alguém para trocar senha ou excluir" class="inputnamePesq"/>
								</div>
							</div>
							<br />
							<div id="result2"></div><br><br>
						</div>
					</div>
				</li>
<!-------------------------------------------------------------------------------------LOCAIS--------------------------------------------------------------------------------------------------->
				<script>
				$(document).ready(function(){
					load_data();
					function load_data(query)
					{
						$.ajax({
							url:"php/fetch8.php",
							method:"post",
							data:{query:query},
							success:function(data)
							{
								$('#result3').html(data);
							}
						});
					}
					
					$('#searchL').keyup(function(){
						var search = $(this).val();
						if(search != ''){
							load_data(search);
						}
						else{
							load_data();			
						}
					});
				});
				</script>
				<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab3">
					<label for="tab3" class="lab1">Locais</label>
					<div class="content">
						<div class="conteudo"></br>
						<h2 align="center" class="description description-second">Locais cadastrados no sistema</h2><br/></br>
									<div class="form-group">
										<div class="input-group">
											<input type="text" name="searchL" id="searchL" placeholder="Pesquise por locais" class="inputnamePesq"/>&nbsp;<input type="submit" class="btn btn-second" onclick="return addLocal()" value="Adicionar"></button>
										</div>
									</div>
									<br/>
									<div id="result3"></div> 
								
								<div style="clear:both"></div></br>
							<!------------------------------------------ADICIONAR------------------------------------------------->
							<script type="text/javascript">
								function addLocal(){
									location.href="addLocal.php"
								}
							</script>
							<div align="center">
								</br></br></br>
							</div>
						</div>
					</div>
				</li>
<!-------------------------------------------------------------------------------------Feedbacks--------------------------------------------------------------------------------------------------->
				<script>
				$(document).ready(function(){
					load_data();
					function load_data(query)
					{
						$.ajax({
							url:"php/fetch9.php",
							method:"post",
							data:{query:query},
							success:function(data)
							{
								$('#result1').html(data);
							}
						});
					}
					
					$('#searchM').keyup(function(){
						var search = $(this).val();
						if(search != ''){
							load_data(search);
						}
						else{
							load_data();			
						}
					});
				});
				</script>
				<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab2" checked>
					<label for="tab2" class="lab1">Feedbacks</label>
					<div class="content">
						<div class="conteudo">
						<table>
								<tr>
									<td>
									<p class="description description-primary">Bem vindo <?= $_SESSION['nomeUser']?> <?/*= $_SESSION['email']*/?> </p><br>
									</td>
									<td>
										<div class="transparent">
										</div>
									</td>
									<td>
									
									</td>
								<tr>
							</table>
							<script type="text/javascript">
								function hist(){
									location.href="historico.php"
								}
							</script>
							<script type="text/javascript">
								function home(){
									location.href="index.php.php"
								}
							</script>
							
							<script type="text/javascript">
								function sair(){
									location.href="php/sair.php"
								}
							</script>
							<table align="left">
								<tr>
									<td>
										<div align="left">
											<input type="button" value="sair" class="bot" onclick="sair()">
										</div>
									</td>
									<td>
										<div class="transparent">
										</div>
									</td>
									<td>
										<div align="left">
											<input type="button" value="histórico" class="bot" onclick="hist()">
										</div>
									</td>
								</tr>
							</table>
							<br><br>
							<h2 align="center" class="description description-second">Mensagens de Usuários</h2>
							<br/><br/>
							<div class="form-group">
										<div class="input-group">
											<input type="text" name="searchM" id="searchM" placeholder="Pesquise por mensagens" class="inputnamePesq"/>
										</div>
									</div>
									<br/>
									<div id="result1"></div> 
								
								<div style="clear:both"></div></br>
						</div>
					</div>
				</li>
<!------------------------------------------------------LOGO----------------------------------------------------------------->
				<style>
					.logo3{
						border-radius:45px;
						width: 190px;
						height: 65px;
						align-self: center;
						border: none;
						/* background-image:url("Imagem4.png"); */
						background-size:100%;
						color:transparent;
						transform:translate(-115%,0%);
					}
				</style>
				<li >
					<label>
						<img src="css/Imagem4.png"  class="logo3"><br>
						
					</label>
				</li>
			</ul>
		</meta>
		</nav>
	</body>
</html>
