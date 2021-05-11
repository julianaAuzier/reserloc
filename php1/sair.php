<?php
	session_start();
	
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	
	header('Location: ../formulario_logar_css.php');
?>