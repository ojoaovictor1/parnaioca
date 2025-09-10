<?php 
include '../config/conexao.php';

//$sql_consulta = "SELECT * FROM frigobar";
$sql = "SELECT fg.id, fg.acomodacao_nome, fg.acomodacao_id, fg.numero, a.nome  FROM parnaioca.frigobar fg INNER JOIN acomodacoes a ON fg.acomodacao_id = a.id ORDER BY id;";
$resultado = mysqli_query($con, $sql);

if(mysqli_num_rows($resultado) >= 0){
   echo "<table border='1' class='table table-dark table-striped table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Acomodação</th>
                    <th>Acomodação ID</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['acomodacao_id'] . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        //echo "<td> <a href='dFrigobar.php?id=" . $row['id'] . "'>Del.</a> </td>";

        echo "<td>
        <button type='button' class='btn btn-danger btn-sm' 
            data-bs-toggle='modal' 
            data-bs-target='#exampleModal' 
            data-id='".$row['id']."' 
            data-nome='".$row['nome']."'>
            Excluir
        </button>
      </td>";

        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum frigobar Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>