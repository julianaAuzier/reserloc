<?php
	session_start();
	include "php/conecta_banco.php";
	require_once('php/conect.class.php');
	
	if((!isset($_SESSION['email'])) and (!isset($_SESSION['senha']))){
		 header('Location:index.php');
		//echo"você não está logado";
	}
	else if((isset($_SESSION['email'])) and (isset($_SESSION['senha']))){
		// $a=$_SESSION['email'];
		// $b=$_SESSION['senha'];
		
		//if(($_SESSION['email']=="juliana@juliana")and($_SESSION['senha']=="senha0"))
		if(($_SESSION['nomeUser']=="Administrador"))
			header('Location:admin.php');
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
<!-------------------------------------------------------------------------------------Historico--------------------------------------------------------------------------------------------------->
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
				<li>
					<input type="radio" name="tabs" class="rd_tabs" id="tab6">
					<label for="tab6" class="lab1">Histórico</label>
					<div class="content">
						<div class="conteudo">
							<br>
							<h2 align="center" class="description description-second">Encontre todas as reservas ja feitas na UFOPA</h2><br>
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="hist" id="hist" placeholder="Digite qualquer informação sobre a reserva" class="inputnamePesq"/>
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
					</div>
				</li>
<!-------------------------------------------------------------------------------------SOLICITAÇÃOES--------------------------------------------------------------------------------------------------->
				<script>
				$(document).ready(function(){
					load_data();
					function load_data(query)
					{
						$.ajax({
							url:"php/fetch11.php",
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
							<!--<footer>
								<p>Copyright &copy;2020 | <a href="juliana.auzier.s@gmail.com">Juliana Auzier </a></p><br>
							</footer>-->
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
							url:"php/fetch5.php",
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
					<input type="radio" name="tabs" class="rd_tabs" id="tab4">
					<label for="tab4" class="lab1">Locais</label>
					<div class="content">
						<div class="conteudo"></br>
						<h2 align="center" class="description description-second">Locais cadastrados no sistema</h2><br/>
									<div class="form-group">
										<div class="input-group">
											<input type="text" name="searchL" id="searchL" placeholder="Pesquise por locais" class="inputnamePesq"/>
											<!------------------------------------------ADICIONAR------------------------------------------------->
											<script type="text/javascript">
												function addLocal(){
													location.href="addLocal.php"
												}
											</script>
											&nbsp;<input type="submit" class="btn btn-second" onclick="return addLocal()" value="Adicionar"></button>
										</div>
									</div>
									<br/>
									<div id="result3"></div> 
								
								<div style="clear:both"></div></br></br>
						</div>
					</div>
				</li>
<!--------------------------------------------------------------------------------MINHAS RESERVAS--------------------------------------------------------------------------------------------------->
				<script>
				$(document).ready(function(){
					load_data();
					function load_data(query)
					{
						$.ajax({
							url:"php/fetch7.php",
							method:"post",
							data:{query:query},
							success:function(data)
							{
								$('#result0').html(data);
							}
						});
					}
					
					$('#miReser').keyup(function(){
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
					<input type="radio" name="tabs" class="rd_tabs" id="tab2">
					<label for="tab2" class="lab1">Minhas reservas</label>
					<div class="content">
						<div class="conteudo">
							<br><br>
							<h2 align="center" class="description description-second">Encontre suas reservas</h2><br/><br/>
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="miReser" id="miReser" placeholder="Digite qualquer informação sobre a reserva" class="inputnamePesq"/>
								</div>
							</div>
							<br />
							<div id="result0"></div><br>
						</div>
						<div style="clear:both"></div><br><br><br>
					</div>
				</li>
<!-------------------------------------------------------------------------------------RESERVAR--------------------------------------------------------------------------------------------------->
				<script type="text/javascript">
				function reser() {
				  var a = document.forms["reserva"]["nomeUser"].value;
				  var b = document.forms["reserva"]["descricao"].value;
				  var c = document.forms["reserva"]["entrada"].value;
				  var d = document.forms["reserva"]["saida"].value;
				  var e = document.forms["reserva"]["data"].value;
				 
				  
				  if(c >= d){
					  alert("Período inválido");
					  return false;
				  }
				  if (a == "") {
					alert("Preencha todos os campos");
					return false;
				  }
				  if (b == "") {
					alert("Preencha todos os campos");
					return false;
				  }
				  if (c == "") {
					alert("Preencha todos os campos");
					return false;
				  }
				  if (d == "") {
					alert("Preencha todos os campos");
					return false;
				  }
				  if (e == "") {
					alert("Preencha todos os campos");
					return false;
				  }
				  else
					  location.href="php/inserir_dados_reserva.php";
				}
				</script>
				
				<li>
					<style>
						.titulo{
							margin-top:-22px;
							margin-bottom:-20px;
							color: #008b8b;
							font-size: 20px;
							font-weight: 300;
							line-height: 30px;
						}
					</style>
					<input type="radio" name="tabs" class="rd_tabs" id="tab3">
					<label for="tab3" class="lab1">Reservar</label>
					<div class="content">
						<div class="conteudo">
							<form name="reserva" action="php/inserir_dados_reserva.php" onsubmit="return reser()" method="post" align="center"></br>
								<h2 align="center" class="description description-second">Preencha os dados da Reserva</h2><br/>
								<h2 class="description description-primary">Responsável pela reserva</h2><br/>
								<input value=" <?= $_SESSION['nomeUser']?>" name="nomeUser" class="inputname">
								<p class="info">Você pode fazer a reserva para alguém não autorizado <br>no sistema mudando o responsável pela reserva.</p></br>
								<h2 class="description description-primary"> Busque o local para reservar</h2><br>
								<select name="local" class="select">
									<?php
										$result2 = $dbcon->query("select * from local order by campus");
										$sql2="select * from local order by campus";
										$res2=mysqli_query($dbcon,$sql2);
										while($vreg2=mysqli_fetch_row($res2)){
											$idLocal=utf8_encode($vreg2[0]);
											$nomeLocal=utf8_encode($vreg2[1]);
											$predio=utf8_encode($vreg2[2]);
											$numPorta=utf8_encode($vreg2[3]);
											$campus=utf8_encode($vreg2[4]);
										
											$result3 = $dbcon->query("select * from predio where id=$predio");
											$sql3="select * from predio where id=$predio";
											$res3=mysqli_query($dbcon,$sql3);
											while($vreg3=mysqli_fetch_row($res3)){
												$idPredio=utf8_encode($vreg3[0]);
												$nomePredio=utf8_encode($vreg3[2]);
											
												echo "<option value=$idLocal>$nomeLocal, $numPorta - $nomePredio($campus)</opption>";
											}
										}
									?>
								</select> 
								<br/><br/>
								<div align="center">
								<h2 class="description description-primary">Atividade </h2> </br>
									<input type="text" name="descricao" maxlength="40" class="inputname" placeholder="Ex.: Aula de metodologia científica"></textarea><br/><br/>
									<table>
										<tr>
											<td>
												<h2 class="description description-primary">Entrada</h2>
											</td>
											<td>
												<h2 class="description description-primary">Saída</h2>
											</td>
											<td>
												<h2 class="description description-primary">Data</h2>
											</td>
										</tr>	
									</table>
									<br>
									<table>
										<tr>
											<td>
												<input type="time" name="entrada" class="datime">
											</td>
											<td>
												<input type="time" name="saida" class="datime">
											</td>
											<td>
												<input type="date" name="data" class="datime">
											</td>
										</tr>	
									</table>
								</div>
								<input type="submit" class="btn btn-second" value="reservar" onclick="return reser()"></button>
								<input type="reset" class="btn btn-second" value="limpar"> </button>
								<br><br><br><br>
							</form>
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
					<input type="radio" name="tabs" class="rd_tabs" id="tab1" checked>
					<label for="tab1" class="lab1">Reservas</label>
					<div class="content">
						<div class="conteudo">
							<table>
								<tr>
									<td>
									<p class="description description-primary">Bem vindo(a) <?= $_SESSION['nomeUser']?> <?/*= $_SESSION['email']*/?> </p>
									</td>
								</tr>
								<tr>
									<td>
										<br><input type="button" value="sair" class="bot" onclick="sair()">
									</td>
								</tr>
							</table>
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
							<h2 align="center" class="description description-second">Encontre locais reservados</h2><br/><br/>
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="search_text" id="search_text" placeholder="Digite qualquer informação sobre a reserva" class="inputnamePesq"/>
								</div>
							</div>
							<br/>
							<div id="result"></div>
						</div>
						<div style="clear:both"></div><br><br><br>
					</div>
				</li>
<!------------------------------------------------------LOGO----------------------------------------------------------------->
				<li align="left"> 
					<label>
						<img src="css/Imagem4.png" class="logo2">
					</label>
				</li>
			</ul>
		</meta>
		</nav>
	</body>
</html>
