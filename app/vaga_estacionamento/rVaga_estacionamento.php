<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM estacionamento";
$sql_id_acomodacao = "SELECT * FROM acomodacoes";

$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) > 0){
   echo "<table border='1' class='table table-hover table-striped'>
                <tr>
                    <th style='background-color: #ac7835'>ID</th>
                    <th style='background-color: #ac7835'>Número</th>
                    <th style='background-color: #ac7835'>Ativo</th>
                    <th style='background-color: #ac7835'>Acomodação ID</th>
                    <th style='background-color: #ac7835'>Situação</th>
                    <th style='background-color: #ac7835'>Editar</th>
                    <th style='background-color: #ac7835'>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['ativo'] . "</td>";
        echo "<td>" . $row['acomodacao_id'] . "</td>";
        echo "<td>" . ($row['situacao'] == 1 ? 'Ativo' : 'Inativo') . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'><button class='btn btn-primary'>Edit</button></a> </td>";
        //echo "<td> <a href='dVaga_estacionamento.php?id=" . $row['id'] . "'>Del.</a> </td>";

        if($_SESSION['poderes'] == 'admin'){
        echo "<td>
        <button type='button' class='btn btn-danger btn-sm' 
            data-bs-toggle='modal' 
            data-bs-target='#exampleModal' 
            data-id='".$row['id']."' 
            data-nome='".$row['ativo']."'>
            Excluir
        </button>
      </td>";
        }else{
           echo "<td>
        <button type='button' class='btn btn-danger btn-sm' 
            data-bs-toggle='modal' 
            disabled
            data-bs-target='#exampleModal' 
            data-id='".$row['id']."' 
            data-nome='".$row['ativo']."'>
            Excluir
        </button>
      </td>"; 
        }
        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum Cliente Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>