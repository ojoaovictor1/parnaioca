<?php
session_start();
include '../config/conexao.php';

$id_hospedagem = $_GET['id'];

$sql_itens = "SELECT * FROM itens_frigobar WHERE ativo = 'Ativo'";
$resultado_itens = mysqli_query($con, $sql_itens);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <div id="topo">
            <ol id="breadcrumb">
                <li>
                    <a href="../inicio.php#cadastros">
                    <i class="fa-solid fa-user"></i>    
                    Cadastros</a>
                </li>
                <li>
                    Cadastrar Cliente
                </li>
            </ol>
        </div>
    <h1>Consumo do Frigobar</h1>

    <form action="cConsumo_frigobar.php" method="POST">
        <input type="hidden" name="id_hospedagem" value="<?php echo $id_hospedagem; ?>">

        <?php while($row = mysqli_fetch_assoc($resultado_itens)): ?>
            <label><?php echo $row['nome']; ?> (R$ <?php echo $row['preco']; ?>)</label>
            <input type="number" name="itens[<?php echo $row['id']; ?>]" value="0" min="0"><br>
        <?php endwhile; ?>

        <input type="submit" value="Enviar nota para o checkout">
    </form>

    <br> <br>
    <a href="../hospedagem/index.php">Voltar</a>
    <?php include 'rConsumo_frigobar.php'; ?>
</body>
</html>