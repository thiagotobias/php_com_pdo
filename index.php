<?php

require_once 'model/Aluno.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}catch (\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: ".$e->getCode().": ".$e->getMessage());
}

$aluno = new Aluno($conexao);

if ($_POST['btn_acao'] == 'Inserir') {
	$nomeAluno = $_POST['AlunoName'];
	$notaAluno = $_POST['AlunoNota'];

    if (!empty($notaAluno) and !empty($nomeAluno)) {
        $aluno->setNome("$nomeAluno")
              ->setNota($notaAluno);

        $resultado = $aluno->inserir();

        if ($resultado == 1) {
            header('Location: index.php');
        }else{
            $msg_erro = $resultado;
            echo $msg_erro;
            ?>
            <form action="index.php" method="post">
                <input type="submit" name="btn_acao" value="Voltar"/>
            </form>
            <?php
        }
    }else{
        echo "Preencher todos os campos!";
        ?>
        <form action="index.php" method="post">
            <input type="submit" name="btn_acao" value="Voltar"/>
        </form>
        <?php
    }
}

if ($_POST['btn_acao'] == 'Modificar') {
    $idAluno = $_POST['id_aluno'];
    $nomeAluno = $_POST['AlunoName'];
    $notaAluno = $_POST['AlunoNota'];
    if (!empty($notaAluno) and !empty($nomeAluno)) {
        $aluno->setID($idAluno)
          ->setNome($nomeAluno)
          ->setNota($notaAluno);

        $resultado = $aluno->alterar();

        if ($resultado == 1) {
            header('Location: index.php');
        }else{
            $msg_erro = $resultado;
            echo $msg_erro;
            ?>
            <form action="index.php" method="post">
                <input type="submit" name="btn_acao" value="Voltar"/>
            </form>
            <?php
        }
    }else{
        echo "Preencher todos os campos!";
        ?>
        <form action="index.php" method="post">
            <input type="submit" name="btn_acao" value="Voltar"/>
        </form>
        <?php
    }
}

if ($_POST['btn_acao'] == 'Remover') {
	$idAluno = $_POST['id_aluno'];

	$resultado = $aluno->deletar($idAluno);
    if ($resultado == 1) {
        header('Location: index.php');
    }else{
        echo $resultado;
    }    
}

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
    	        </tr>
    	        	<?php
    	            foreach ($aluno->listar("id DESC") as $a) {
    					echo "<tr>";                        
    		            echo "<td>".$a['id']."</td>";
    		            echo "<td>".$a['nome']."</td>";
    		            echo "<td>".$a['nota']."</td>";
    		            echo "</tr>";
    		        }
    	            ?>
    	        </tr>
    	    </table>     
    	</body>
        <form action="index.php" method="post">
    	<input type="submit" name="btn_acao" value="Voltar"/>
        </form>
    </html>
<?php
}

if ($_POST['btn_acao'] == 'Remover/Alterar') { ?>
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
                        echo "<form action='index.php' method='post'>";
                        echo "<td>".$a['id']."</td>";
                        echo "<td>".$a['nome']."</td>";
                        echo "<td>".$a['nota']."</td>";
                        echo "<td><input type='submit' name='btn_acao' value='Remover'/></td>";
                        echo "<td><input type='submit' name='btn_acao' value='Alterar'/></td>";
                        echo "<input type='hidden' name='id_aluno' value='".$a['id']."'/>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    ?>
                </tr>
            </table>     
        </body>
        <form action="index.php" method="post">
        <input type="submit" name="btn_acao" value="Voltar"/>
        </form>
    </html>
<?php
}
if ($_POST['btn_acao'] == 'Alterar') {
    $idAluno = $_POST['id_aluno'];
    $resultado = $aluno->find($idAluno);    
    ?>
    <form action="index.php" method="post">
        <table>
            <tr>
                <td>Alteração do Aluno</td>
            </tr>
            <tr>
                <td>
                Nome Aluno:
                </td>
                <td>
                    <input type="text" name="AlunoName" value="<?=$resultado['nome']?>">
                </td>
            </tr>
            <tr>
                <td>
                Nota Aluno:
                </td>
                <td>
                    <input type="text" name="AlunoNota" value="<?=$resultado['nota']?>">
                </td>
            </tr>
            <tr>
                <input type="hidden" name="id_aluno" value="<?=$idAluno?>"/>       
                <td><input type="submit" name="btn_acao" value="Modificar"/></td>
                <td><input type="submit" name="btn_acao" value="Voltar"/></td>        
            </tr>       
            <td></td>
        </table>
    </form>
<?php
}

if ($_POST['btn_acao'] == '' OR $_POST['btn_acao'] == 'Voltar') {?>
    <form action="index.php" method="post">
 		<input type="submit" name="btn_acao" value="Listar"/>
 		<input type="submit" name="btn_acao" value="Cadastrar"/>
 		<input type="submit" name="btn_acao" value="Remover/Alterar"/>
    </form>
<?php
}
if ($_POST['btn_acao'] == 'Cadastrar') {?>
    <form action="index.php" method="post">
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
    </form>
<?php
}