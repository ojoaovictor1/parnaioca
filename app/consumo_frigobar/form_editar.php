<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM consumo_frigobar WHERE id = $id";
$resultado = mysqli_query($con,$sql);
$row = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consumo</title>
</head>
<body>
    <h1>Editar Consumo</h1>
    <form action="uConsumo.frigobar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="item">Item: </label>
        <input type="text" name="item" value="<?php echo $row['item_id']; ?>"><br>
        <input type="number" name="quantidade" value="<?php echo $row['quantidade']; ?>"><br>
        <input type="text" name="valor" value="<?php echo $row['valor_total']; ?>"><br>
        <input type="submit" value="Editar Consumo">
    </form>
</body>
</html>