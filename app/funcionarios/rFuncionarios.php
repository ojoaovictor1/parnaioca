<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM funcionarios";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) > 0){
   echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Poderes</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['cargo'] . "</td>";
        echo "<td>" . $row['poderes'] . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        echo "<td> <a href='dFuncionarios.php?id=" . $row['id'] . "'>Del.</a> </td>";
        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum Cliente Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>