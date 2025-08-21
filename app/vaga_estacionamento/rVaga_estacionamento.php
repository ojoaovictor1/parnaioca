<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM estacionamento";
$sql_id_acomodacao = "SELECT * FROM acomodacoes";

$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) >= 0){
   echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Ativo</th>
                    <th>Acomodação ID</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['ativo'] . "</td>";
        echo "<td>" . $row['acomodacao'] . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        echo "<td> <a href='dAcomodacoes.php?id=" . $row['id'] . "'>Del.</a> </td>";
        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum Cliente Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>