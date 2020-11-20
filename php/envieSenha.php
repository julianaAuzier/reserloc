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

		<div class="cont" align="center" ><br><br><br><br><br>
		
		
			<h2 class="description description-second">Envie para
			<?php
				include "conecta_banco.php";
					
				if(isset($_POST)){	
					$id= $_GET['id'];
					$result2 = $dbcon->query("select * from convidado where idConv='$id'");
					$sql2="select * from convidado where idConv='$id'";
					$res2=mysqli_query($dbcon,$sql2);
					while($vreg2=mysqli_fetch_row($result2)){
						$email=$vreg2[3];
						echo "$email";
					}
				}
			?></h2>
			<br>
			
			<br>
			<p class="description description-primary">Sua senha de acesso ao reserloc é 
			<?php
				include "conecta_banco.php";
				
				if(isset($_POST)){	
					$idconv= $_GET['id'];
					
					$numero_de_bytes = 4;
					$restultado_bytes = random_bytes($numero_de_bytes);
					$resultado_final = bin2hex($restultado_bytes);
					$resultado_final = strtoupper(substr(bin2hex(random_bytes(4)), 1));
					
					//dar senha
					$update=$dbcon->query("UPDATE convidado SET senha = '$resultado_final' WHERE idConv = '$idconv'");
					//pegar dados pra tranfer
					$result = $dbcon->query("SELECT * FROM convidado where idConv = '$idconv'");
					if(mysqli_num_rows($result)>0){
						while($row = $result ->fetch_array()){
							$nome =$row['nome'];
							$email =$row['email'];
							$curso =$row['curso'];
							$senha =$row['senha'];
						}
					}else{
						echo "<script>alert('A senha já foi gerada');</script>";
						echo "<script>location.href='../admin.php'</script>";
					}
					//transferindo
					$transferir=$dbcon->query("INSERT INTO user(id, curso, nome, email, senha) VALUES ('$idconv','$curso','$nome','$email','$senha')");

					$delete=$dbcon->query("DELETE FROM convidado WHERE idConv='$idconv'");
					//mostra senha
					if($transferir && $delete){
						echo "$resultado_final";
					}else{
						echo "<script>alert('Erro: Usuário não foi autorizado');</script>";
						echo "<script>location.href='../admin.php'</script>";
					}
				}

				// ini_set('display_errors', 1);
				// error_reporting(E_ALL);
				// $from = "juliana.auzier.s@gmail.com";
				// $to = "conv";
				// $subject = "Verificando o correio do PHP";
				// $message = "Sua senha de acesso ao Sistema de Reservas da UFOPA (RESERLOC) é: $resultado_final";
				// $headers = "De:". $from;
				// mail($to, $subject, $message, $headers);
				// echo "Senha enviada. ";
				
			?>
			</p>
			<br>
			<input value="Voltar" class="btn btn-second" onclick="return voltar()"></button>
		</div>
	</body>
</html>