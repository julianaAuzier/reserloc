<?php
include "conecta_banco.php";

	if(isset($_POST)){
		$nome=$_POST['nomeLocal'];
		$predio=$_POST['predio'];
		$numPorta=$_POST['numPorta'];
		
		$conversao = array('ç' => 'c', 'Ç' => 'C', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
		$nome = strtr($nome, $conversao);
		$numPorta = strtr($numPorta, $conversao);
		
		$result2 = $dbcon->query("select * from predio where id=$predio");
		$sql="select * from predio where id=$predio";
		$res=mysqli_query($dbcon,$sql);
		if($vreg=mysqli_fetch_row($res)){
			$idpredio=utf8_encode($vreg[0]);
			$idCampus=utf8_encode($vreg[1]);
			$nomePredio=utf8_encode($vreg[2]);
		
			$result3 = $dbcon->query("select * from campus where id=$idCampus");
			$sql3="select * from campus where id=$idCampus";
			$res3=mysqli_query($dbcon,$sql3);
			if($vreg3=mysqli_fetch_row($res3)){
				$idCamp=utf8_encode($vreg3[0]);
				$nomeCampus=utf8_encode($vreg3[1]);
				
			}
		}
		
		$verifica=$dbcon->query("SELECT * FROM local WHERE numPorta='$numPorta' and predio='$predio' and nomeL='$nome'");
		
		// echo "$senha, $nomeUser, $idLocal, $descricao, $entrada, $saida, $data, ";
		if(mysqli_num_rows($verifica)>0){
		
				echo "<script>alert('Erro: Local já cadastrado no sistema');</script>";
				echo "<script>location.href='../addLocal.php'</script>";
		
			/*if(mysqli_num_rows($_sql3)>0){
				
				
				if(mysqli_num_rows($_sql2)>0){
					echo "<script>alert('Erro: Local já cadastrado no sistema');</script>";
					echo "<script>location.href='../addLocal.php'</script>";
				}
			}*/
			
		}else{
			$sql2=$dbcon->query("INSERT INTO local(nomeL, predio, numPorta,campus) VALUES ('$nome','$predio','$numPorta','$nomeCampus')");
			
			if($sql2){
				echo "<script>alert('Local adicionado com sucesso!');</script>";
				echo "<script>location.href='../addLocal.php'</script>";
			}else{
				echo "<script>alert('Erro: Local não adicionado');</script>";
				echo "<script>location.href='../addLocal.php'</script>";
			}
		}
	}
?>

