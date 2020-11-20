<?php

 include "conecta_banco.php";
	
	// $texto = "$id | $idLocal | $nomeUser | $descricao | $entrada | $saida | $data | $status |\n";
		
	$result1 = $dbcon->query("select * from historico");
	$sql1="select * from historico";
	$res1=mysqli_query($dbcon,$sql1);
	while($vreg1=mysqli_fetch_array($res1)){
		$id=utf8_encode($vreg1[0]);
		$idLocal=utf8_encode($vreg1[1]);
		$nomeUser=utf8_encode($vreg1[2]);
		$descricao=utf8_encode($vreg1[3]);
		$entrada=utf8_encode($vreg1[4]);
		$saida=utf8_encode($vreg1[5]);
		$data=utf8_encode($vreg1[6]);
		$status=utf8_encode($vreg1[8]);
		
		
		$result2 = $dbcon->query("select * from local where idL='$idLocal'");
		$sql2="select * from local";
		$res2=mysqli_query($dbcon,$sql2);
		while($vreg2=mysqli_fetch_array($res2)){
			$idLoc=utf8_encode($vreg2[0]);
			$nomeLocal=utf8_encode($vreg2[1]);
			$predio=utf8_encode($vreg2[2]);
			$numPorta=utf8_encode($vreg2[3]);
			$campus=utf8_encode($vreg2[4]);
		
			$result3 = $dbcon->query("select * from predio where id=$predio");
			$sql3="select * from predio where id=$predio";
			$res3=mysqli_query($dbcon,$sql3);
			while($vreg3=mysqli_fetch_array($res3)){
				$idPredio=utf8_encode($vreg3[0]);
				$nomePredio=utf8_encode($vreg3[2]);
				
				echo "$id | $nomeLocal | $nomePredio | $campus | $numPorta | $nomeUser | $descricao | $entrada | $saida | $data | $status |  \n <br>";
				$texto = "$id | $nomeLocal | $nomePredio | $campus | $numPorta | $nomeUser | $descricao | $entrada | $saida | $data | $status |\n";
			}
		}
	}
	
	$arq="historico.txt";
	$fp= fopen($arq, "a");
	fwrite($fp,$texto);
	fclose($fp);
?>