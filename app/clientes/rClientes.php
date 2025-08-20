<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM clientes";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) >= 0){
   echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['data_nasc'] . "</td>";
        echo "<td>" . $row['cpf'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td> <a href='form_editar.php'>Edit.</a> </td>";
        echo "<td> <a href='#'>Del.</a> </td>";
        echo "</tr>";
    }
    echo "Total de registros: ". mysqli_num_rows($resultado); 
    
}else{
    echo 'Nenhum Cliente Cadastrado.';
}
?>