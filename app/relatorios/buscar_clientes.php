<?php
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data_entrada = $_POST['entrada'];
    $data_saida = $_POST['saida'];

$sql = "SELECT id,cliente, ativo, data_checkin, data_checkout FROM hospedagem WHERE data_checkin >= '$data_entrada' AND data_checkout <= '$data_saida'";
$resultado = mysqli_query($con,$sql);
?>

 <a href="../inicio.php">Voltar</a>
    <h1>Clientes Por Range</h1>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Ativo</th>
            <th>data_checkin</th>
            <th>data_checkout</th>
           
        </tr>

        <?php while($row = mysqli_fetch_array($resultado)){
            echo "<tr>"; 
            echo "<td>" .$row['id'] . "</td>";
            echo "<td>" .$row['cliente'] . "</td>";
            echo "<td>" .$row['ativo'] . "</td>";
            echo "<td>" .$row['data_checkin'] . "</td>";
            echo "<td>" .$row['data_checkout'] . "</td>";

        }
}
        ?>