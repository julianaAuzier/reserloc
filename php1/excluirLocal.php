<?php
include "conecta_banco.php";
	
	if(isset($_POST)){
		
		$idLocal = $_GET['id'];
		
		$exclusao = $dbcon->query("delete from local WHERE idL = $idLocal");
		
		if($exclusao){
			echo "<script>alert('Local excluído com sucesso!');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
		else{
			echo "<script>alert('Erro: Local não excluído');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
	}
?>