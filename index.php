<?php
require_once 'Aluno.php';

 try{
    $conexao = new \PDO("mysql:host=lovalhost;dbname=pdo","root","root");
 }catch (\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: ".$e->getCode().": ".$e->getMessage());
 }

$aluno = new Alunos($conexao);
