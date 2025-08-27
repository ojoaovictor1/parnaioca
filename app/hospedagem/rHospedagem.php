<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM hospedagem";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) > 0){
   echo "<table border='1'>
                <tr>
                    <th>Check IN</th>
                    <th>Check OUT</th>
                    <th>Cliente</th>
                    <th>Acomodação</th>
                    <th>Status</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['data_checkin'] . "</td>";
        echo "<td>" . $row['data_checkout'] . "</td>";
        echo "<td>" . $row['cliente'] . "</td>";
        echo "<td>" . $row['acomodacao'] . "</td>";
        echo "<td>" . $row['ativo'] . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        echo "<td> <a href='dHospedagem.php?id=" . $row['id'] . "'>Del.</a> </td>";
        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum Cliente Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>