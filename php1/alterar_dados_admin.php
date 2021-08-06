<?php

include "conecta_banco.php";
	session_start();
	$admin=$_SESSION['nomeUser'];
	
	if(isset($_POST)){
		
		$email=$_POST['emailAdmin'];
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
