<?php
//require_once 'Aluno.php';

 try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");

    $query = "SELECT * FROM alunos;";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    $query_nota = "SELECT * FROM alunos ORDER BY nota DESC,nome ASC LIMIT 3;";
    $stmt = $conexao->prepare($query_nota);
    $stmt->execute();
    $result_nota = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    ?>
    <table border="1">
        <tr>
            <td>Listar Tudo</td>
            <td>As 3 Maiores Notas</td>
        </tr>
        <tr>
            <td>
            <table border="1">
            	<tr>
            		<td>ID</td>
            		<td>Nome</td>
            		<td>Nota</td>    		
            	</tr>
            	<?php
            foreach ($resultado as $key => $value) {
            	echo "<tr>";
            	echo "<td>".$value['id']."</td>";
            	echo "<td>".$value['nome']."</td>";
            	echo "<td>".$value['nota']."</td>";
            	echo "</tr>";
            }
            ?>
             </table>
             </td>
             <td valign="top">
                 <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Nota</td>           
                    </tr>
                    <?php
                foreach ($result_nota as $keyy => $valuee) {
                    echo "<tr>";
                    echo "<td>".$valuee['id']."</td>";
                    echo "<td>".$valuee['nome']."</td>";
                    echo "<td>".$valuee['nota']."</td>";
                    echo "</tr>";
                }
                ?>
                 </table>
             </td>
         </tr>
     </table>

    <?php

    //print_r($resultado);

 }catch (\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: ".$e->getCode().": ".$e->getMessage());
 }

//$aluno = new Alunos($conexao);
