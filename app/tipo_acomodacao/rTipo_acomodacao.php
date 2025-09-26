<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM tipo_da_acomodacao";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) >= 0){
   echo "<table border='1' class='table table-striped table-dark table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Situação</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['tipo'] . "</td>";
        echo "<td>" . ($row['situacao'] == 1 ? 'Ativo' : 'Inativo') . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        //echo "<td> <a href='dTipo_acomodacao.php?id=" . $row['id'] . "'>Del.</a> </td>";

        if($_SESSION['poderes'] == 'admin'){
        echo "<td>
        <button type='button' class='btn btn-danger btn-sm' 
            data-bs-toggle='modal' 
            data-bs-target='#exampleModal' 
            data-id='".$row['id']."' 
            data-nome='".$row['tipo']."'>
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
            data-nome='".$row['tipo']."'>
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