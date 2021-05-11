<?php
include "conecta_banco.php";
	
	if(isset($_POST)){
		
		$idM = $_GET['id'];
		
		$exclusao = $dbcon->query("delete from mensagem WHERE id = $idM");
		
		if($exclusao){
			echo "<script>alert('Mensagem excluída com sucesso!');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
		else{
			echo "<script>alert('Erro: Mensagem não excluída');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
	}
?>