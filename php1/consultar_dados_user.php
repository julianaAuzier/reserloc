<?php
include "conecta_banco.php";

	$result = $dbcon->query("SELECT * FROM user");
	if(mysqli_num_rows($result)>0){
		while($row = $result ->fetch_array()){
			echo $row['nome'];
			echo "<br/>";
			echo $row['email'];
			echo "<br/>";
			echo $row['senha'];
			echo "<br/>";
		}
	}else{
		echo "Login erro";
	}
?>