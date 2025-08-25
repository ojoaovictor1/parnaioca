<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM frigobar";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) >= 0){
   echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Acomodação ID</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['acomodacao_id'] . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        echo "<td> <a href='dFrigobar.php?id=" . $row['id'] . "'>Del.</a> </td>";
        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum frigobar Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>