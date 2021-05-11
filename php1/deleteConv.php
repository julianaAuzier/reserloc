<?php

	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "reserloc";
	$dbcon = new MySQLi("$host","$usuario","$senha","$banco");
	
	$id = $_GET['id'];
	
	//$del= $dbcon->query("DELETE FROM reserva WHERE idReserva = '$id'");
	$del= "delete from convidado where idConv='$id' ";
	$delete = mysqli_query($dbcon, $del);
	echo ($id);
		if($delete){
			echo "<script>alert('Solicitação excluída');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}else{
			echo "<script>alert('ERRO: Solicitação não excluída');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
?>