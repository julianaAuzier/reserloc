<?php
include "conecta_banco.php";

	if(isset($_POST)){
		$usuario=$_POST['usuario'];
		
		$conversao = array('ç' => 'c', 'Ç' => 'C', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
		$usuario = strtr($usuario, $conversao);
		
		$_usuarioDoSistema = $dbcon->query("select id from user where email='$usuario'");
		if(mysqli_num_rows($_usuarioDoSistema)>0){
			//echo "<script>alert('user existe');</script>";
			$mensagem="!Por favor, preciso de uma nova senha";
			
			$sql2=$dbcon->query("INSERT INTO mensagem(usuario,mensagem) VALUES ('$usuario','$mensagem')");
				if($sql2){
					echo "<script>alert('Mensagem enviada com sucesso!');</script>";
					echo "<script>location.href='../formulario_logar_css.php'</script>";
				}else{
					echo "<script>alert('Erro: Mensagem não enviada');</script>";
					echo "<script>location.href='../formulario_logar_css.php'</script>";
				}
		}
		else
			echo "<script>alert('Usuário não existente no sistema. Por favor, realize seu cadastro');</script>";
			echo "<script>location.href='../formulario_logar_css.php'</script>";
	}
?>