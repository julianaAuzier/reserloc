<?php

include "conecta_banco.php";
	session_start();
	$admin=$_SESSION['nomeUser'];
	
	if(isset($_POST)){
		
		$email=$_POST['emailAdmin'];
		
		// $conversao = array('ç' => 'c', 'Ç' => 'C', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
		// $email = strtr($nome, $email);
	//	UPDATE `user` SET `senha` = 'senha0' WHERE `user`.`id` = 12
		
		$sql2=$dbcon->query("UPDATE user set email='$email' where nome = 'Administrador'");
		if($sql2){
			echo "<script>alert('Email alterado com sucesso');</script>";
			header('Location:sair.php');
		}else{
			echo "<script>alert('Erro: Email nao alterado');</script>";
			echo "<script>location.href='../admin.php'</script>";
		}
	}
?>