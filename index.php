<?php

require_once 'model/Aluno.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}catch (\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: ".$e->getCode().": ".$e->getMessage());
}

$aluno = new Aluno($conexao);

//print_r($_POST);exit;

if ($_POST['btn_acao'] == 'Inserir') {
	$nomeAluno = $_POST['AlunoName'];
	$notaAluno = $_POST['AlunoNota'];

	$aluno->setNome("$nomeAluno")
    	->setNota($notaAluno);

    $resultado = $aluno->inserir();

    if ($resultado == 1) {
    	$msg = "Aluno: $nomeAluno inserido com sucesso!";
    	$_POST['btn_acao'] = '';
    }else{
    	$msg_erro = $resultado;
    }
}

if ($_POST['btn_acao'] == 'Remover') {
	$nomeAluno = $_POST['AlunoName'];
	$notaAluno = $_POST['AlunoNota'];
print_r($_POST);exit;
	$resultado = $aluno->deletar(7);
	foreach ($aluno->listar("id DESC") as $a) {
		echo $a['nome']."<br>";    
	}

	$aluno->setNome("$nomeAluno")
    	->setNota($notaAluno);

    //$resultado = $aluno->inserir();

    if ($resultado == 1) {
    	$msg = "Aluno: $nomeAluno inserido com sucesso!";
    	$_POST['btn_acao'] = '';
    }else{
    	$msg_erro = $resultado;
    }
}
?>
<form action="index.php" method="post">
<?php
if ($_POST['btn_acao'] == 'Listar') { ?>
<html>
	<body>
	    <table border="1">
	        <tr>
	            <td colspan="5" >Lista de Alunos</td>	         
	        </tr>
	        <tr>
	        	<td>ID</td>
	            <td>Nome</td>
	            <td>Nota</td>
	            <td colspan="2">Ações</td>
	        </tr>
	        	<?php
	            foreach ($aluno->listar("id DESC") as $a) {								
					echo "<tr>";
		            echo "<td>".$a['id']."</td>";
		            echo "<td>".$a['nome']."</td>";
		            echo "<td>".$a['nota']."</td>";
		            echo "<td><input type='submit' name='btn_acao' value='Remover'/> <input type='hidden' name='".$a['id']."' value='".$a['id']."'/> </td>";
		            echo "<td><input type='submit' name='btn_acao' value='Alterar'/> <input type='hidden' name='".$a['id']."' value='".$a['id']."'/> </td>";
		            echo "</tr>";
		        }
	            ?>
	        </tr>
	    </table>     
	</body>
	<input type="submit" name="btn_acao" value="Voltar"/>
</html>
<?php
}
if ($_POST['btn_acao'] == '' OR $_POST['btn_acao'] == 'Voltar') {?>			
 		<input type="submit" name="btn_acao" value="Listar"/>
 		<input type="submit" name="btn_acao" value="Cadastrar"/>
 		<input type="submit" name="btn_acao" value="Remover"/>
<?php
}
if ($_POST['btn_acao'] == 'Cadastrar') {?>
	<table>
		<tr>
			<td>Cadastro de Alunos</td>
		</tr>
		<tr>
			<td>
			Nome Aluno:
			</td>
			<td>
				<input type="text" name="AlunoName" value="">
			</td>
		</tr>
		<tr>
			<td>
			Nota Aluno:
			</td>
			<td>
				<input type="text" name="AlunoNota" value="">
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="btn_acao" value="Inserir"/></td>
			<td><input type="submit" name="btn_acao" value="Voltar"/></td>
		</tr>
		
		<td></td>
	</table>
<?php
}
?>
</form>
<?php

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

/*
$resultado = $aluno->find(8);
echo $resultado['nome']." - ".$resultado['nota'];
*/