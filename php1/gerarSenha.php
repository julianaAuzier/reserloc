<?php

	include "conecta_banco.php";
	
	if(isset($_POST)){	
		$idconv= $_GET['id'];
		
		$numero_de_bytes = 4;
		$restultado_bytes = random_bytes($numero_de_bytes);
		$resultado_final = bin2hex($restultado_bytes);
		$resultado_final = strtoupper(substr(bin2hex(random_bytes(4)), 1));
		
		
		$update=$dbcon->query("UPDATE convidado SET senha = '$resultado_final' WHERE idConv = '$idconv'");
		
		$result = $dbcon->query("SELECT * FROM convidado where idConv = '$idconv'");
		if(mysqli_num_rows($result)>0){
			while($row = $result ->fetch_array()){
				$nome =$row['nome'];
				$email =$row['email'];
				$curso =$row['curso'];
				$senha =$row['senha'];
			}
		}else{
			echo "erro";
		}
		
		$transferir=$dbcon->query("INSERT INTO user(id, curso, nome, email, senha) VALUES ('$idconv','$curso','$nome','$email','$senha')");

		$delete=$dbcon->query("DELETE FROM convidado WHERE idConv='$idconv'");
		
		if($update){
			echo "<script>alert('Usuário autorizado com sucesso!');</script>";
			echo "<script>location.href='../envieSenha.php'</script>";
			
		}else{
			echo "<script>alert('Erro: Usuário não autorizado');</script>";
			echo "<script>location.href='../admin.php'</script>";
		}
	}else
		echo"erro";

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