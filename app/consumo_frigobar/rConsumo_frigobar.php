<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM consumo_frigobar";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) >= 0){
   echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Hospedagem</th>
                    <th>Item</th>
                    <th>Quantiade</th>
                    <th>Valor Total</th>
                    <th>Data</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['hospedagem_id'] . "</td>";
        echo "<td>" . $row['item_id'] . "</td>";
        echo "<td>" . $row['quantidade'] . "</td>";
        echo "<td>" . $row['valor_total'] . "</td>";
        echo "<td>" . $row['momento'] . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        echo "<td> <a href='dItem_frigobar.php?id=" . $row['id'] . "'>Del.</a> </td>";
        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum Item Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>