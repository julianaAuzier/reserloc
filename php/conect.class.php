
<?php

class conect {

	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'root';

	//senha
	private $senha = '';

	//banco de dados
	private $database = 'reserloc';

	public function conecta_mysql(){

		//criar a conexao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		//ajustar o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($con, 'utf8');

		//verficar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();	
		}

		return $con;
	}

}

/*
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "reserloc";
	
	$dbcon = new MySQLi("$host","$usuario","$senha","$banco");
	/*
	<?php	 
	 
	 function abrirConexao(){
		$conexao = @mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die (mysqli_connect_error());
		mysqli_set_charset($conexao, CHARSET);
			
		return $conexao;
	 }
	 
	 function fecharConexao($conexao){
		@mysqli_close($conexao) or die (mysqli_error($conexao));
	 }
	 
	 function executar($sql, $id = false){
		$conexao = abrirConexao();
		$qry = @mysqli_query($conexao, $sql) or die(@mysqli_error($conexao));	
		
		if($id)
			$qry = mysqli_insert_id($conexao);
			
		fecharConexao($conexao);
		return $qry;
	 }
	 
	 function consultar($tabela, $condicao=null, $campos = "*"){
			if($condicao!=null)
				$condicao = " WHERE " .$condicao;
			$sql = "SELECT {$campos} FROM {$tabela} {$condicao} ";
			//echo $sql;
			$qry = executar($sql);
			
			if(!mysqli_num_rows($qry))
				return false;
			else{
				while($linha = @mysqli_fetch_assoc($qry)){
					$dados[] = $linha;
				}
			return $dados;
			}		
	 }
	 
	 function selecionar($sql){			
			$qry = executar($sql);
			
			if(!mysqli_num_rows($qry))
				return false;
			else{
				while($linha = @mysqli_fetch_assoc($qry)){
					$dados[] = $linha;
				}
			return $dados;
			}		
	 }
 
	function inserir($tabela, array $dados, $id = false){
		$dados 		= escapa($dados);	
		$campos 	= implode(", ", array_keys($dados));
		$valores 	= "'". implode("', '", $dados)."'";
		$sql 		= "INSERT INTO $tabela ({$campos}) VALUES ({$valores}) ";
		
		return executar($sql,$id);
	}
	
	function alterar($tabela, array $dados, $condicao){	
		$dados 		= escapa($dados);
		foreach ($dados as $chave => $valor)
			$campos[] = "{$chave} = '{$valor}' ";
		
		$campos = implode (", ", $campos);
		$sql = "UPDATE {$tabela} SET {$campos} WHERE {$condicao}";
		
		return executar($sql);
	}
	
	function deletar($tabela, $condicao){
		$sql = "DELETE FROM {$tabela} WHERE {$condicao}";
		
		return executar($sql);
	}
	
	// Protege contra SQL Injection
	function escapa($data){
		$link = abrirConexao();
		
		if(!is_array($data))
			$dados = mysqli_real_escape_string($link, $data);
		else {
			$arr = $data;
			
			foreach ($arr as $key => $value){
				$key 	= mysqli_real_escape_string($link, $key);
				$value	= mysqli_real_escape_string($link, $value);
				
				$data[$key] = $value;
			}
		}
		
		fecharConexao($link);
		return $data;
	}

	function total($sql){
		$qry = executar($sql);
		return mysqli_num_rows($qry);
	*/
	
?>




























