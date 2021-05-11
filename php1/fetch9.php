<?php
		
	/*mensagens do admin*/
	
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
	$query = "SELECT mensagem.*
	FROM mensagem
	WHERE (mensagem.usuario LIKE '%".$search."%'
	OR mensagem.mensagem LIKE '%".$search."%')
	";
}
else
{
	$query = "SELECT mensagem.*
	FROM mensagem
	order by usuario";
}

//$data= date("d/m/y", strtotime($vreg[6]));

$result3 = mysqli_query($dbcon, $query);
if(mysqli_num_rows($result3) > 0){
	$output1 .= '<div align="center">
					<table class="tabel">
						<tr class="linha">
							<th class="tit">Usuário</th>
							<th class="tit">Mensagem</th>
							<th class="tit">Excluir</th>
						</tr>';
	while($row = mysqli_fetch_array($result3))
	{
		$output .= '
			<tr class="linha">
				<td class="corp">'.$row["usuario"].'</td>
				<td class="corp">'.$row["mensagem"].'</td>
				<td class="corp"><a class="excl" name="id" id="id" href="php/excluirMensagem.php?id=' .$row["id"].'">xixi</td>
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