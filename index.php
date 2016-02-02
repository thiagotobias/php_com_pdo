<?php

require_once 'Aluno.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}catch (\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: ".$e->getCode().": ".$e->getMessage());
}


$aluno = new Aluno($conexao);

/* Inserir 
$aluno->setNome("Thiago Tobias 2")
      ->setNota(8)
;

$resultado = $aluno->inserir();
echo $resultado;
*/

/* Listar
foreach ($aluno->listar("id DESC") as $a) {
    echo $a['nome']."<br>";    
}
*/

/*Alterar
$aluno->setID(7)
      ->setNome("Thiago Tobias 2")
      ->setNota(8)
;

$resultado = $aluno->alterar();
echo $resultado;
*/

/* Remover
$resultado = $aluno->deletar(7);
foreach ($aluno->listar("id DESC") as $a) {
    echo $a['nome']."<br>";    
}
*/

$resultado = $aluno->find(8);
echo $resultado['nome']." - ".$resultado['nota'];