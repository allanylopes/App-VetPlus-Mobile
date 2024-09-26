<?php 

include_once('conexao.php');

$postjson = json_decode(file_get_contents('php://input'), true);

//NÃO ESQUEÇA DE ALTERAR AQUI O NOME DA SUA TABELA
$query = $pdo->prepare("SELECT * from cadastro_pets");

$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++) { 
    foreach ($res[$i] as $key => $value) {  }      

    $dados[] = array(
        //COLOQUE AQUI OS ATRIBUTOS DA SUA TABELA
        'id' => $res[$i]['id'],
        'titular' => $res[$i]['titular'],
        'nome' => $res[$i]['nome'],    
        'especie' => $res[$i]['especie'],
        'raca' => $res[$i]['raca'],   
        'porte' => $res[$i]['porte'] 
                         
    );

    }

   if(count($res) > 0){
           $result = json_encode(array('success'=>true, 'result'=>$dados));

       }else{
           $result = json_encode(array('success'=>false, 'result'=>'0'));

       }

echo $result;

?>