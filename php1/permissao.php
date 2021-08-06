<?php
include "conecta_banco.php";

	if(isset($_POST)){
		$idconv= $_GET['id'];
		
		/*$conversao = array('ç' => 'c', 'Ç' => 'C', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
		$usuario = strtr($usuario, $conversao);*/
		
		$_emailconv = $dbcon->query("select email from convidado where idConv='$idconv'");
		
		$result = $dbcon->query("SELECT * FROM convidado where idConv = '$idconv'");
		if(mysqli_num_rows($result)>0){
			while($row = $result ->fetch_array()){
				$nome =$row['nome'];
				$email =$row['email'];
				$curso =$row['curso'];
				$senha =$row['senha'];
				
				$_emailconv=$email;
				//echo $_emailconv;
			}
		}
		
		if(($_emailconv)!=""){
			$mensagem="!Gere uma senha para este novo usuario.";
			
			$sql2=$dbcon->query("INSERT INTO mensagem(usuario,mensagem) VALUES ('$_emailconv','$mensagem')");
				if($sql2){
					echo "<script>alert('Solicitação de permissão enviada! A senha de acesso será recebida pelo usuário assim que o administrador gerar uma senha');</script>";
					echo "<script>location.href='../abas_visualizacao.php'</script>";
				}else{
					echo "<script>alert('Erro: Solicitação de permissão não enviada. O Administrador ainda não sabe se este usuário deverá receber uma senha de acesso');</script>";
					echo "<script>location.href='../abas_visualizacao.php'</script>";
				}
		}
		else{
			echo "<script>alert('A identificação do usuário foi perdida.');</script>";
			echo "<script>location.href='../abas_visualizacao.php'</script>";
		}
	}
?>
