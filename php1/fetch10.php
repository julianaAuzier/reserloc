<?php
		
	/*usuarios do sistema*/
	
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "reserloc";
	$dbcon = new MySQLi("$host","$usuario","$senha","$banco");

$connect = mysqli_connect("localhost", "root", "");
$output1 = '';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($dbcon, $_POST["query"]);
	$query = "SELECT user.*
	FROM user
	WHERE (user.nome LIKE '%".$search."%'
	OR user.email LIKE '%".$search."%')
	";
}
else
{
	$query = "SELECT user.*
	FROM user
	order by nome";
}

//$data= date("d/m/y", strtotime($vreg[6]));

$result3 = mysqli_query($dbcon, $query);
if(mysqli_num_rows($result3) > 0){
	$output1 .= '<div align="center">
					<table class="tabel">
						<tr class="linha">
							<th class="tit">Nome</th>
							<th class="tit">Email</th>
							<th class="tit">Nova senha</th>
							<th class="tit">Excluir</th>
						</tr>';
	while($row = mysqli_fetch_array($result3))
	{
		$output .= '
			<tr class="linha">
				<td class="corp">'.$row["nome"].'</td>
				<td class="corp">'.$row["email"].'</td>
				<td class="corp"><a class="troca" name="id" id="id" href="php/gerarSenha2.php?id=' .$row["id"].'">xixi</td>
				<td class="corp"><a class="excl" name="id" id="id" href="php/excluir_dados_user.php?id=' .$row["id"].'">xixi</td>
			</tr>
		';
	}
	echo ($output1);
	echo utf8_encode($output);
}
else
{
	echo 'Nada encontrado';
}
?>