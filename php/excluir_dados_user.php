<?php
include "conecta_banco.php";

	$id = $_GET['id'];
	
	$ver= "select nomeUser from user where id='$id' ";
	
	$result2 = $dbcon->query("select * from user where id='$id'");
		$sql2="select * from user where id='$id'";
		$res2=mysqli_query($dbcon,$sql2);
		while($vreg2=mysqli_fetch_row($res2)){
			$id=utf8_encode($vreg2[0]);
			$curso=utf8_encode($vreg2[1]);
			$nome=utf8_encode($vreg2[2]);
			
		}
	if($nome == "Administrador"){
		echo "<script>alert('ERRO: Administrador não pode ser excluído');</script>";
		echo "<script>location.href='../admin.php'</script>";
	}
	else{
	//$del= $dbcon->query("DELETE FROM reserva WHERE idReserva = '$id'");
	$del= "delete from user where id='$id' ";
	$delete = mysqli_query($dbcon, $del);
	echo ($id);
		if($delete){
			echo "<script>alert('Usuário excluído com sucesso');</script>";
			echo "<script>location.href='../admin.php'</script>";
		}else{
			echo "<script>alert('ERRO: Usuário não excluído');</script>";
			echo "<script>location.href='../admin.php'</script>";
		}
	}
?>