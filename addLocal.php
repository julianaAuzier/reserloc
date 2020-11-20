<?php
	session_start();
	include "php/conecta_banco.php";
	require_once('php/conect.class.php');
	
	if((!isset($_SESSION['email'])) and (!isset($_SESSION['senha']))){
		 header('Location:index.php');
		//echo"você não está logado";
	}
?>
<html>
	<script type="text/javascript">
		function addLoc() {
		  var f = document.forms["addlocal"]["nomeLocal"].value;
		  var g = document.forms["addlocal"]["numPorta"].value;
		  
		  if (f == "") {
			alert("Preencha todos os campos");
			return false;
		  }
		  if (g == "") {
			alert("Preencha todos os campos");
			return false;
		  }
		}
	</script>
	<script type="text/javascript">
		function voltar(){
			location.href="abas_visualizacao.php"
		}
	</script>
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
	Adicionar local
	</title>
		<div align="center"><br><br><br>
			<form name="addlocal" action="php/adicionar_local.php" onsubmit="return addLoc()" method="post">
				<h2 class="description description-second">Adicione um local</h2><br>
				<p class="description description-primary"></p><br/>
				<h2 class="description description-primary">Nome do local</h2></br>
				<input type="text" name="nomeLocal" maxlength="49" class="inputname" placeholder=" ex.: Laboratório da Disciplina...">	<br><br>
				<h2 class="description description-primary">Selecione o prédio</h2></br>
				<select name="predio" class="select">
					<?php
						$result2 = $dbcon->query("select * from predio");
						$sql2="select * from predio";
						$res2=mysqli_query($dbcon,$sql2);
						while($vreg2=mysqli_fetch_row($res2)){
							$idpredio=utf8_encode($vreg2[0]);
							$idCampus=utf8_encode($vreg2[1]);
							$nomePredio=utf8_encode($vreg2[2]);
						
							$result3 = $dbcon->query("select * from campus where id=$idCampus");
							$sql3="select * from campus where id=$idCampus";
							$res3=mysqli_query($dbcon,$sql3);
							while($vreg3=mysqli_fetch_row($res3)){
								$idCamp=utf8_encode($vreg3[0]);
								$nomeCampus=utf8_encode($vreg3[1]);
							
								echo "<option value=$idpredio>$nomePredio, $nomeCampus</opption>";
							}
						}
					?>
				</select>
				<br/><br/>
				<h2 class="description description-primary">Identificação da porta<h2></br>
					<input type="text" name="numPorta" maxlength="15" class="inputname" placeholder="ex.: H-102 ou 208">	<br>
					
					<input type="submit" class="btn btn-second" onclick="return addLoc()">
					<input type="reset" value="limpar" class="btn btn-second"><br><br>
					<input value="voltar" class="btn btn-second" onclick="return voltar()">
			</form><br><br><br>
		</div>
	</body>
</html>