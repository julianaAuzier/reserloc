<?php

	session_start();

include "conecta_banco.php";

	if(isset($_POST)){
		
		$usuario=$_SESSION['email'];
		$mensagem=$_POST['mensagem'];
		
		$conversao = array('ç' => 'c', 'Ç' => 'C', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
		$mensagem = strtr($mensagem, $conversao);
		//$usuario = strtr($usuario, $conversao);
		
		$sql2=$dbcon->query("INSERT INTO mensagem(usuario,mensagem) VALUES ('$usuario','$mensagem')");
			if($sql2){
				echo "<script>alert('Mensagem enviada com sucesso!');</script>";
				echo "<script>location.href='../abas_visualizacao.php'</script>";
			}else{
				echo "<script>alert('Erro: Mensagem não enviada');</script>";
				echo "<script>location.href='../abas_visualizacao.php'</script>";
			}
	
	}
?>