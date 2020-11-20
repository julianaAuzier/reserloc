<?php
include "conecta_banco.php";
	session_start();
	if(isset($_POST)){
		$email=$_SESSION['email'];
		$user= $_SESSION['nomeUser'];//$dbcon->query("SELECT nome from user where email=$email");
		$senha=$_SESSION['senha'];
		
		$idLocal=$_POST['local'];
		$nomeUser=$_POST['nomeUser'];	
		$descricao=$_POST['descricao'];
		$entrada=$_POST['entrada'];
		$saida=$_POST['saida'];
		$data=$_POST['data'];
		
		date_default_timezone_set('America/Sao_Paulo');
		
		$hoje= date('Y-m-d');
		$agora= date('H:i');
		
		if($data<$hoje){
			echo "<script>alert('Erro: Data inválida');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
		else if($data==$hoje){
			if(($agora>$entrada) || ($agora>$saida)){
				echo "<script>alert('Erro: Horário inválido');</script>";
				echo "<script>location.href='../abas_visualizacao.php'</script>";
			}
			else{
				$conversao = array('ç' => 'c', 'Ç' => 'C','á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
				$descricao = strtr($descricao, $conversao);
				$nomeUser = strtr($nomeUser, $conversao);
				$verifica=$dbcon->query("SELECT * FROM reserva WHERE idLocal='$idLocal' and data='$data' and entrada='$entrada' and saida='$saida'");//and (entrada= between'$entrada' and $saida') or (saida between '$saida' and '$entrada') and data='$data
				
				// echo "$senha, $nomeUser, $idLocal, $descricao, $entrada, $saida, $data, ";
				if(mysqli_num_rows($verifica)>0){
					echo "<script>alert('Erro: Local já está reservado neste período');</script>";
					echo "<script>location.href='../abas_visualizacao.php'</script>";
				}
				else{
					$sql2=$dbcon->query("INSERT INTO reserva(idLocal, nomeUser, descricao, entrada, saida, data, senhaUser) VALUES ('$idLocal','$nomeUser','$descricao','$entrada','$saida','$data','$senha')");
					$sql4=$dbcon->query("INSERT INTO historico(idLocal, nomeUser, descricao, entrada, saida, data, senhaUser, status) VALUES ('$idLocal','$nomeUser','$descricao','$entrada','$saida','$data','$senha', 'Reservado')");
					
					if($sql2 && $sql4){
						echo "<script>alert('Reserva realizada com sucesso');</script>";
						echo "<script>location.href='../abas_visualizacao.php'</script>";
					}else{
						echo "<script>alert('Erro: Reserva não realizada');</script>";
						//echo "<script>location.href='../abas_visualizacao.php'</script>";
					}
				}
			}
		}else if($data>$hoje){
			$conversao = array('ç' => 'c', 'Ç' => 'C','á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
			$descricao = strtr($descricao, $conversao);
			$nomeUser = strtr($nomeUser, $conversao);
			$verifica=$dbcon->query("SELECT * FROM reserva WHERE idLocal='$idLocal' and data='$data' and (('$entrada' between entrada and saida) or ('$saida' between entrada and saida))");//and (entrada= between'$entrada' and $saida') or (saida between '$saida' and '$entrada') and data='$data
			
			// echo "$senha, $nomeUser, $idLocal, $descricao, $entrada, $saida, $data, ";
			if(mysqli_num_rows($verifica)>0){
				echo "<script>alert('Erro: Local já está reservado neste período');</script>";
				echo "<script>location.href='../abas_visualizacao.php'</script>";
			}
			else{
				$sql2=$dbcon->query("INSERT INTO reserva(idLocal, nomeUser, descricao, entrada, saida, data, senhaUser) VALUES ('$idLocal','$nomeUser','$descricao','$entrada','$saida','$data','$senha')");
				$sql4=$dbcon->query("INSERT INTO historico(idLocal, nomeUser, descricao, entrada, saida, data, senhaUser, status) VALUES ('$idLocal','$nomeUser','$descricao','$entrada','$saida','$data','$senha', 'Reservado')");
				
				if($sql2){
					echo "<script>alert('Reserva realizada com sucesso');</script>";
					echo "<script>location.href='../abas_visualizacao.php'</script>";
				}else{
					echo "<script>alert('Erro: Reserva não realizada');</script>";
					echo "<script>location.href='../abas_visualizacao.php'</script>";
				}
			}
		}
	}
?>
