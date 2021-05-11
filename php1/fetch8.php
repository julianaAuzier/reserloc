<?php
		
	/*locais do admin*/
	
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
	$query = "SELECT local.*, predio.*
	FROM local, predio
	WHERE local.predio = predio.id
	AND (local.nomeL LIKE '%".$search."%'
	OR numPorta LIKE '%".$search."%'
	OR local.campus LIKE '%".$search."%'
	OR predio.nome LIKE '%".$search."%')
	";
}
else
{
	$query = "SELECT local.* , predio.*
	FROM local, predio
	WHERE local.predio = predio.id
	order by campus";
}

//$data= date("d/m/y", strtotime($vreg[6]));

$result3 = mysqli_query($dbcon, $query);
if(mysqli_num_rows($result3) > 0){
	$output1 .= '<div align="center">
					<table class="tabel">
						<tr class="linha">
							<th class="tit">Local</th>
							<th class="tit">Porta</th>
							<th class="tit">Campus</th>
							<th class="tit">Prédio</th>
							<th class="tit">Excluir</th>
						</tr>';
	while($row = mysqli_fetch_array($result3))
	{
		$output .= '
			<tr class="linha">
				<td class="corp">'.$row["nomeL"].'</td>
				<td class="corp">'.$row["numPorta"].'</td>
				<td class="corp">'.$row["campus"].'</td>
				<td class="corp">'.$row["nome"].'</td>
				<td class="corp"><a class="excl" name="id" id="id" href="php/excluirLocal.php?id=' .$row["idL"].'">xixi</td>
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