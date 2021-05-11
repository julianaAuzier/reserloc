<?php

/*solicitacoes para o admin*/

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
		$query = "SELECT convidado.*, curso.*
		FROM convidado, curso
		WHERE convidado.curso = curso.id
		AND (convidado.nome LIKE '%".$search."%'
		OR email LIKE '%".$search."%'
		OR curso.nomeCurso LIKE '%".$search."%')
		";
	}
	else
	{
		$query = "SELECT convidado.*, curso.*
		FROM convidado, curso
		WHERE convidado.curso = curso.id
		order by nome";
	}

	//$data= date("d/m/y", strtotime($vreg[6]));

	$result3 = mysqli_query($dbcon, $query);
	if(mysqli_num_rows($result3) > 0){
		$output1 .= '<div align="center">
						<table class="tabel">
							<tr class="linha">
								<th class="tit">Nome</th>
								<th class="tit">Instituto</th>
								<th class="tit">E-mail</th>
								<th class="tit">Excluir</th>
								<th class="tit">Permitir</th>
							</tr>';
		while($row = mysqli_fetch_array($result3))
		{
			$output .= '
				<tr class="linha">
					<td class="corp">'.$row["nome"].'</td>
					<td class="corp">'.$row["nomeCurso"].'</td>
					<td class="corp">'.$row["email"].'</td>
					<td class="corp"><a class="excl" name="id" id="id" href="php/deleteConv.php?id=' .$row["idConv"].'">xixi</td>
					<td class="corp"><a class="perm" name="id" id="id" href="php/permissao.php?id=' .$row["idConv"].'">xixi</td>
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