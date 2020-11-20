<?php
	session_start();
	include "php/conecta_banco.php";
	require_once('php/conect.class.php');
	
	if((isset($_SESSION['email'])) and (isset($_SESSION['senha']))){
		 header('Location:abas_visualizacao.php');
		//echo"você não está logado";
	}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Reserloc</title>
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	
</head>
<body>
	<script type="text/javascript">
		function voltar(){
			location.href="index.php"
		}
	</script>
	<script type="text/javascript">
	function verlog() {
	  var x = document.forms["login"]["senha"].value;
	  var y = document.forms["login"]["email"].value;
	  
	  if (x == "") {
		alert("Preencha todos os campos");
		return false;
	  }
	  if (y == "") {
		alert("Preencha todos os campos");
		return false;
	}
	}
	</script>
	
	<script type="text/javascript">
	function vercad() {
	  var c = document.forms["user"]["nome"].value;
	  var d = document.forms["user"]["email"].value;
	  
	  if (c == "") {
		alert("Preencha todos os campos");
		return false;
	  }
	  if (d == "") {
		alert("Preencha todos os campos");
		return false;
	  }
	}
	</script>
	
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo ao reserloc!</h2>
                <p class="description description-primary">Para manter-se conectado conosco</p> 
                <p class="description description-primary">entre com suas informações pessoais</p>
                <button id="signin" class="btn btn-primary">Entrar</button><br>
				<button type="submit" class="btn btn-second" onclick="return voltar()">Voltar</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">crie uma conta</h2>
             
                <p class="description description-second">Preencha e aguarde o recebimento da senha de acesso</p><br/>
				
				<form class="form" name="user" action="php/inserir_dados_user.php" method="post">
					<label class="label-input" for="">
						 <i class="far fa-user icon-modify"></i>
						<input type="text" name="nome" class="form-control" placeholder=" Nome" maxlength="49">
					</label>
					
					<label class="label-input" for="">
						<i class="far fa-envelope icon-modify"></i>
						<input type="email" name="email" class="form-control" placeholder=" Email" maxlength="90">
					</label>
					<br/>
					<p class="description description-second">Instituto ao qual estás vinculado(a):</p>
					<select class="select" name="curso" id="curso">
						<?php
							$result2 = $dbcon->query("select * from curso");
							$sql2="select * from curso";
							$res2=mysqli_query($dbcon,$sql2);
							while($vreg2=mysqli_fetch_row($res2)){
								$idCurso=utf8_encode($vreg2[0]);
								$nomeCurso=utf8_encode($vreg2[1]);
								echo "<option value=$idCurso>$nomeCurso</opption>";
							}
						?>
					</select>
					<button type="submit" class="btn btn-second" onclick="return vercad()">Cadastrar</button>
				</form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá de volta!</h2>
                <p class="description description-primary">Entre com suas informações pessoais</p>
                <p class="description description-primary">e comece a reservar no Reserloc</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button><br>
				<button type="submit" class="btn btn-second" onclick="return voltar()">Voltar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">login Reserloc</h2><br/><br/>
                <p class="description description-second"></p>
                <form class="form" name="login" action="php/login.php" method="post">
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
                    </label>
					<button type="submit" class="btn btn-second" onclick="return verlog()">entrar</button>
					<p align="center"><a href="esquecisenha.php"  class="description description-second">Esqueci minha senha</a></p>
				</form> 
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
	
    <script src="js/app.js"></script>
</body>
</html>

<?php
	mysqli_close($dbcon);
?>