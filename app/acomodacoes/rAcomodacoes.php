<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM acomodacoes";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) >= 0){
   echo "<table border='1' class='table table-striped table-hover '>
                <tr>
                    <th style='background-color: #ac7835'>ID</th>
                    <th style='background-color: #ac7835'>Nome</th>
                    <th style='background-color: #ac7835'>Número</th>
                    <th style='background-color: #ac7835'>Valor</th>
                    <th style='background-color: #ac7835'>Capacidade</th>
                    <th style='background-color: #ac7835'>Situação</th>
                    <th style='background-color: #ac7835'>Nome_Tipo</th>
                    <th style='background-color: #ac7835'>Editar</th>
                    <th style='background-color: #ac7835'>Excluir</th>
                </tr>";
    while( $row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['valor'] . "</td>";
        echo "<td>" . $row['capacidade'] . "</td>";
        echo "<td>" . $row['situacao'] . "</td>";
        echo "<td>" . $row['tipo_nome'] . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        //echo "<td> <a href='dAcomodacoes.php?id=" . $row['id'] . "'>Del.</a> </td>";
        
        if($_SESSION['poderes'] == 'admin'){
        echo "<td>
        <button type='button' class='btn btn-danger btn-sm' 
            data-bs-toggle='modal' 
            data-bs-target='#exampleModal' 
            data-id='".$row['id']."' 
            data-nome='".$row['nome']."'>
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
                    data-nome='".$row['nome']."'>
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