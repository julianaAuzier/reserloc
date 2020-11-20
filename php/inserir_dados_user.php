<?php

include "conecta_banco.php";

	if(isset($_POST)){
		$nome=$_POST['nome'];	
		$email=$_POST['email'];
		$curso=$_POST['curso'];
		
		$_emailC=$dbcon->query("SELECT * FROM convidado WHERE email='$email'");
		$_emailU=$dbcon->query("SELECT * FROM user WHERE email='$email'");
		//$idcurso=$dbcon->query("SELECT idCurso FROM curso WHERE nome='$curso'");
		//$_senha=$dbcon->query("SELECT * FROM user WHERE senha='$senha'");

		$conversao = array('ç' => 'c', 'Ç' => 'C', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'í' => 'i', 'î' => 'i', 'ì' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ò' => 'o', 'ö' => 'o', 'õ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ü' => 'u', 'Á' => 'A', 'Ã' => 'A', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ò' => 'O', 'Ö' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ù' => 'U', 'Ü' => 'U');
		$nome = strtr($nome, $conversao);
		
		if(mysqli_num_rows($_emailC)>0 or mysqli_num_rows($_emailU)>0){
			echo "<script>alert('Erro: Email já cadastrado');</script>";
			echo "<script>location.href='../formulario_logar_css.php'</script>";
		}else{
			$sql2=$dbcon->query("INSERT INTO convidado(nome, email, curso) VALUES ('$nome','$email','$curso')");
			if($sql2)
			{
				echo "<script>alert('Cadastro realizado com sucesso. Aguarde a verificação de seus dados para receber a senha de acesso em seu e-mail. ');</script>";
				echo "<script>location.href='../formulario_logar_css.php'</script>";
			}else{
				echo "<script>alert('Erro: Cadastro não realizado');</script>";
				echo "<script>location.href='../formulario_logar_css.php'</script>";
			}
		}
	}else{
		echo "Dados vazios";
	}
?>