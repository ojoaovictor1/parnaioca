<?php 
include '../config/conexao.php';

$sql_consulta = "SELECT * FROM hospedagem";
$resultado = mysqli_query($con, $sql_consulta);

if(mysqli_num_rows($resultado) > 0){
   echo "<table border='1' class='table table-dark table-striped table-hover'>
                <tr>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Cliente</th>
                    <th>Acomodação</th>
                    <th>Status</th>
                    <th>Realizar Check-in</th>
                    <th>Realizar Check-out</th>
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
        /*echo "<td>
                 <a  
                    data-bs-toggle='modal'
                    data-bs-target='#checkin-modal'
                    data-id='".$row['id']."'
                    data-nome='".$row['cliente']."'
                    data-acomodacao='".$row['acomodacao'] ."' 
                    type='button' 
                    class='btn btn-info btn-sm'>Check-in
                </a>
                </td>";*/

        $sql_valor_acomodacao = "SELECT valor FROM acomodacoes WHERE nome = '" . $row['acomodacao'] . "'";
        $resultado_valor = mysqli_query($con, $sql_valor_acomodacao);
        $valor_acomodacao = mysqli_fetch_assoc($resultado_valor)['valor'];
        echo "<td>
        <button type='button' class='btn btn-info btn-sm' 
            data-bs-toggle='modal' 
            data-bs-target='#checkin-modal' 
            data-id='".$row['id']."' 
            data-nome='".$row['cliente']."'
            data-valor='".$valor_acomodacao."'
            data-acomodacao='".$row['acomodacao']."'>
            Check-in
        </button>
      </td>";
        echo "<td> <a href='../consumo_frigobar/index.php?id=" . $row['id'] . "' type='button' class='btn btn-secondary btn-sm'>Check-out</a> </td>";
        echo "<td> <a href='form_editar.php?id=" . $row['id'] . "'>Edit.</a> </td>";
        //echo "<td> <a href='dHospedagem.php?id=" . $row['id'] . "'>Del.</a> </td>";

        echo "<td>
        <button type='button' class='btn btn-danger btn-sm' 
            data-bs-toggle='modal' 
            data-bs-target='#exampleModal' 
            data-id='".$row['id']."' 
            data-nome='".$row['cliente']."'
            data-acomodacao='".$row['acomodacao']."'>
            Excluir
        </button>
      </td>";

        echo "</tr>";
    }
    
    
}else{
    echo 'Nenhum Cliente Cadastrado.';
}
echo "Total de registros: ". mysqli_num_rows($resultado); 
?>