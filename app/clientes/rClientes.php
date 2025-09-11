<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM clientes";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) >= 0){

    echo "<form action='rClientes.php' method='POST'>";
    echo "<select name='cliente'>";
    echo "<option value=''>Todos</option>";
    echo "<option value='Ativo'>Ativo</option>";
    echo "<option value='Inativo'>Inativo</option>";
    echo "</select>";
    echo "<input type='submit' value='Filtrar'>";
    echo "</form>";

    $filtro = isset($_POST['cliente']) ? $_POST['cliente'] : '';

    if($filtro == 'Ativo'){
        $sql_consulta = "SELECT * FROM clientes WHERE situacao = '1'";
        $resultado = mysqli_query($con, $sql_consulta);
    }elseif($filtro == 'Inativo'){
        $sql_consulta = "SELECT * FROM clientes WHERE situacao = '0'";
        $resultado = mysqli_query($con, $sql_consulta);
    } else{
        $sql_consulta = "SELECT * FROM clientes";
        $resultado = mysqli_query($con, $sql_consulta);
    }

   echo "<table border='1' class='table table-striped table-dark table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Situação</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
    while($row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['data_nasc'] . "</td>";
        echo "<td>" . $row['cpf'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td>" . ($row['situacao'] == 1 ? 'Ativo' : 'Inativo') . "</td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        //echo "<td> <a href='dClientes.php?id=" . $row['id'] . "'>Del.</a> </td>";

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
    echo "Total de registros: ". mysqli_num_rows($resultado);
    
    
}else{
    echo 'Nenhum Cliente Cadastrado.';
}
?>