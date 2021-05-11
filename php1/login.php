<?php

	session_start();
	// include "conecta_banco.php";

	require_once('conect.class.php');
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	$sql="SELECT * FROM user WHERE email='$email' AND senha='$senha'";
	
	$objDb = new conect();
	
	$link = $objDb->conecta_mysql();
	
	$resultado_id = mysqli_query($link, $sql);
	
	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){

			$_SESSION['idUser'] = $dados_usuario['id'];
			$_SESSION['nomeUser'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];
			$_SESSION['senha'] = $dados_usuario['senha'];
			
			header('Location: ../abas_visualizacao.php');
			
			// echo $dados_usuario['nome'];
			// echo $dados_usuario['id'];
			// echo $dados_usuario['email'];
			// echo $dados_usuario['senha'];
			
		} else {
			echo "<script>alert('Erro: Usuário ou senha incorretos');</script>";
			echo "<script>location.href='../formulario_logar_css.php'</script>";
		}
	} else {
		echo "<script>alert('Erro: Usuário ou senha incorretos');</script>";
		echo "<script>location.href='../formulario_logar_css.php'</script>";
	}
	
	// if(isset($_POST)){
		// if(isset($_POST['email']) and isset($_POST['senha'])){
			// $email = $_POST['email'];
			// $senha = $_POST['senha'];
			
			// $sql=$dbcon->query("SELECT * FROM user WHERE email='$email' AND senha='$senha'");
			// if(mysqli_num_rows($sql)>0){
				//echo "login ok";
				// header('Location: ../abas_visualizacao.php');
			// }
			// else{
				// header('Location: ../formulario_logar_css.php?erro=1');
				// echo "login erro";
			// }	
		// }else{
			// echo "POST VAZIO";
		// }
		
	// }
?>