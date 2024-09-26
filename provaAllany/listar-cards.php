<?php 

include_once('conexao.php');

$postjson = json_decode(file_get_contents('php://input'), true);

$id_usu = @$_GET['user'];

$total_usuarios = 0;

//NÃO ESQUEÇA DE ALTERAR AQUI O NOME DA SUA TABELA
$query = $pdo->query("SELECT * from cadastro_pets ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_usuarios = @count($res);


$result = json_encode(array('success'=>true, 
    'total_usuarios'=>$total_usuarios
        
));

echo $result;

?>
