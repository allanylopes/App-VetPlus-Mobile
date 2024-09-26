<?php 
require_once("conexao.php");

//NÃO ESQUEÇA DE ALTERAR AQUI O NOME DA SUA TABELA
$tabela = 'cadastro_pets';

$postjson = json_decode(file_get_contents('php://input'), true);


$titular = @$postjson['titular'];
$nome = @$postjson['nome'];
$especie = @$postjson['especie'];
$raca = @$postjson['raca'];
$porte = @$postjson['porte'];


$res = $pdo->prepare("INSERT INTO $tabela SET titular = :titular, nome = :nome, especie = :especie, raca = :raca, porte = :porte");	


$res->bindValue(":titular", "$titular");
$res->bindValue(":nome", "$nome");
$res->bindValue(":especie", "$especie");
$res->bindValue(":raca", "$raca");
$res->bindValue(":porte", "$porte");

$res->execute();

$result = json_encode(array('mensagem'=>'Salvo com sucesso!', 'sucesso'=>true));

echo $result;

?>