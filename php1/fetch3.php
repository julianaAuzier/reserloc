<?php

/*reservas*/

	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "reserloc";
	$dbcon = new MySQLi("$host","$usuario","$senha","$banco");

	$connect = mysqli_connect("localhost", "root", "");
	$output = '';
	$output1 = '';
	
	// date_default_timezone_set('America/Sao_Paulo');
	// $hj= date('Y-m-d');
	// $agr= date('H:i');
	
	$ver="SELECT idReserva FROM reserva WHERE data < CURRENT_DATE";
	$verifica=mysqli_query($dbcon, $ver);
	
	$upd="UPDATE historico SET status='Utilizada' WHERE (data < CURRENT_DATE) and (status <> 'Cancelada') ";
	$updat=mysqli_query($dbcon, $upd);
	
	$del="DELETE FROM reserva WHERE data < CURRENT_DATE";
	$deleta=mysqli_query($dbcon, $del);
	
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($dbcon, $_POST["query"]);
		$query = "SELECT distinct reserva.*, local.*, predio.*
		FROM reserva, local, predio
		WHERE reserva.idLocal = local.idL
		AND local.predio = predio.id
		AND (nomeUser LIKE '%".$search."%'
		OR descricao LIKE '%".$search."%' 
		OR entrada LIKE '%".$search."%' 
		OR saida LIKE '%".$search."%'
		OR data LIKE '%".$search."%'
		OR idLocal LIKE '%".$search."%'
		OR local.nomeL LIKE '%".$search."%'
		OR numPorta LIKE '%".$search."%'
		OR local.campus LIKE '%".$search."%'
		OR predio.nome LIKE '%".$search."%')
		";
	}
	else
	{
		$query = "SELECT reserva.*, local.* , predio.*
		FROM reserva, local, predio
		WHERE reserva.idLocal = local.idL
		AND local.predio = predio.id
		ORDER BY data";
	}
	
	function formatoData($d){
		return date('d-m-Y',strtotime($d));
	}
	function formatoHora($h){
		return date('H:i',strtotime($h));
	}

	$result = mysqli_query($dbcon, $query);
	if(mysqli_num_rows($result) > 0){
		$output1 .= '<div align="center">
						<table class="tabel">
							<tr class="linha">
								<th class="tit">Responsável</th>
								<th class="tit">Entrada</th>
								<th class="tit">Saída</th>
								<th class="tit">Data</th>
								<th class="tit">Local</th>
								<th class="tit">Porta</th>
								<th class="tit">Campus</th>
								<th class="tit">Prédio</th>
								<th class="tit">Atividade</th>
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr class="linha">
					<td class="corp">'.$row["nomeUser"].'</td>
					<td class="corp">'.formatoHora($row["entrada"]).'</td>
					<td class="corp">'.formatoHora($row["saida"]).'</td>
					<td class="corp">'.formatoData($row["data"]).'</td>
					<td class="corp">'.$row["nomeL"].'</td>
					<td class="corp">'.$row["numPorta"].'</td>
					<td class="corp">'.$row["campus"].'</td>
					<td class="corp">'.$row["nome"].'</td>
					<td class="corp">'.$row["descricao"].'</td>
					
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