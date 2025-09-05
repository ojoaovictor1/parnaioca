<?php
session_start();
include '../config/conexao.php';

$sql = "SELECT * FROM clientes WHERE situacao = 1 ";
$resultado_sql = mysqli_query($con,$sql);

$sqlno = "SELECT * FROM clientes WHERE situacao != 1 ";
$resultado_sqlno = mysqli_query($con,$sqlno);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../inicio.php">Voltar</a>
    <h1>Clientes Ativos</h1>
    <table border='1'>
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
        </tr>

        <?php while($row = mysqli_fetch_array($resultado_sql)){
            echo "<tr>"; 
            echo "<td>" .$row['id'] . "</td>";
            echo "<td>" .$row['nome'] . "</td>";
            echo "<td>" .$row['data_nasc'] . "</td>";
            echo "<td>" .$row['cpf'] . "</td>";
            echo "<td>" .$row['email'] . "</td>";
            echo "<td>" .$row['telefone'] . "</td>";
            echo "<td>" .$row['estado'] . "</td>";
            echo "<td>" .$row['cidade'] . "</td>";
            echo "<td>" .$row['situacao'] . "</td>";
            echo "</tr>";

        }
        ?> <br> <br>
    </table>
        <h1>Clientes Inativos</h1>
    <table border='1'>
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
        </tr>

        <?php while($row = mysqli_fetch_array($resultado_sqlno)){
            echo "<tr>"; 
            echo "<td>" .$row['id'] . "</td>";
            echo "<td>" .$row['nome'] . "</td>";
            echo "<td>" .$row['data_nasc'] . "</td>";
            echo "<td>" .$row['cpf'] . "</td>";
            echo "<td>" .$row['email'] . "</td>";
            echo "<td>" .$row['telefone'] . "</td>";
            echo "<td>" .$row['estado'] . "</td>";
            echo "<td>" .$row['cidade'] . "</td>";
            echo "<td>" .$row['situacao'] . "</td>";
            echo "</tr>";

        }
        ?> <br> <br>

</body>
</html>