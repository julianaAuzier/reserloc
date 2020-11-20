<?php
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "reserloc";
	$dbcon = new MySQLi("$host","$usuario","$senha","$banco");
	
	$id = $_GET['id'];
	//$del= $dbcon->query("DELETE FROM reserva WHERE idReserva = '$id'");
	$mud="UPDATE historico SET status='Cancelada' where idReserva='$id'";
	$muda=mysqli_query($dbcon, $mud);
	
	$del= "delete from reserva where idReserva='$id' ";
	$delete = mysqli_query($dbcon, $del);
	//echo ($id);
		if($delete){
			echo "<script>alert('Reserva excluída com sucesso!');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}else{
			echo "<script>alert('Erro: Reserva não excluída');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
?>