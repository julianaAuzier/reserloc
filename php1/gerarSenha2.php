
<html lang="pt-br">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RESERLOC</title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/estilo3.css">
	
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
						location.href="../admin.php"
					}
		</script>

		<div class="cont" align="center"><br><br><h1 class="description description-second">Reserloc informa:<h1><br><br><br>
		<h2 class="description description-second">Copie o texto abaixo e envie para
		<?php
			include "conecta_banco.php";
				
			if(isset($_POST)){	
				$id= $_GET['id'];
				$result2 = $dbcon->query("select * from user where id='$id'");
				$sql2="select * from user where id='$id'";
				$res2=mysqli_query($dbcon,$sql2);
				while($vreg2=mysqli_fetch_row($result2)){
					// $id=$vreg2[0];
					// $curso=$vreg2[1];
					// $nome=$vreg2[2];
					$email=$vreg2[3];
					echo "$email";
				}
			}
		?></h2>
		<br>
		
		<br>
			<p class="description description-primary">Sua nova senha de acesso ao reserloc é 
			<?php
				include "conecta_banco.php";
				
				if(isset($_POST)){	
					$id= $_GET['id'];
					
					$numero_de_bytes = 6;
					$restultado_bytes = random_bytes($numero_de_bytes);
					$resultado_final = bin2hex($restultado_bytes);
					$resultado_final = strtoupper(substr(bin2hex(random_bytes(6)), 1));
					
					
					$update=$dbcon->query("UPDATE user SET senha = '$resultado_final' WHERE id = '$id'");
					
					if($update){
						//echo "<script>alert('Senha alterada com sucesso!');</script>";
						//echo "<script>location.href='../envienovasenha.php'</script>";
						
						
						echo $resultado_final;
						
					}else{
						echo "<script>alert('Erro: Não foi possível trocar a senha deste usuário');</script>";
						echo "<script>location.href='../admin.php'</script>";
					}
				}else
					echo "<script>alert('Erro: Não foi possível trocar a senha deste usuário');</script>";
			?>
			</p>
			<br>
			<input value="Voltar" class="btn btn-second" onclick="return voltar()"></button>
		</div>
	</body>
</html>