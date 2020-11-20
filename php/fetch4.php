<?php

/*locais*/
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
	order by nome";
}

//$data= date("d/m/y", strtotime($vreg[6]));

$result2 = mysqli_query($dbcon, $query);
if(mysqli_num_rows($result2) > 0){
	$output1 .= '<div align="center">
					<table class="tabel">
						<tr class="linha">
							<th class="tit">Local</th>
							<th class="tit">Porta</th>
							<th class="tit">Campus</th>
							<th class="tit">Prédio</th>
						</tr>';
	while($row = mysqli_fetch_array($result2))
	{
		$output .= '
			<tr class="linha">
				<td class="corp">'.$row["nomeL"].'</td>
				<td class="corp">'.$row["numPorta"].'</td>
				<td class="corp">'.$row["campus"].'</td>
				<td class="corp">'.$row["nome"].'</td>
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