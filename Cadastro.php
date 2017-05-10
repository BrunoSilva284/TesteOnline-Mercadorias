<?php
//conexao
$server = "localhost";
$username = "root";
//$password = "root";
$db = "teste";
$conn = new mysqli($server, $username, null, $db);

// Checar conexão
if ($conn->connect_error) {
	die("Falha na conexão: " . $conn->connect_error);
}
$nome=  filter_input(INPUT_POST, 'nome');
$qtd=  filter_input(INPUT_POST, 'qtd');
$preco= filter_input(INPUT_POST, 'preco');
$tipo= filter_input(INPUT_POST, 'tipo');
$neg= filter_input(INPUT_POST, 'neg');
$data =(string)date('Y/m/d');//data atual

$vtotal = $preco * $qtd;//valor do pedido

$cadastro="insert into tb_mercadoria (MerTip, MerNom, MerQtd, MerVal, MerNeg, MerVto, MerDat) values ('$tipo','$nome',$qtd,$preco,'$neg', $vtotal,'$data');";

if ($conn->query($cadastro) === TRUE) {
	echo "Cadastro efetuado com sucesso!";
} else {
	echo "Erro: " . $cadastro . "<br>" . $conn->error;
}

$conn->close();

?>