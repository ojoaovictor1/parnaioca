<?php
session_start();
include '../config/conexao.php';

$erroItem = isset($_SESSION['erroItem']) ? $_SESSION['erroItem'] : '';
unset($_SESSION['erroItem']);

$sql_clientes = "SELECT * FROM clientes";
$resultado_clientes = mysqli_query($con,$sql_clientes);

$sql_acomodacoes = "SELECT * FROM acomodacoes";
$resultado_acomodacoes = mysqli_query($con,$sql_acomodacoes);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedagem</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Cadastro de Hospedagem</h1>
            <?php if($erroItem) : ?>
                <p style="color: red;"><?= $erroItem; ?></p>
            <?php endif; ?>
            <form action="cHospedagem.php" method="POST">
                
                <input type="date" name="data_checkin">
                <input type="date" name="data_checkout">

                <select name="cliente">
                    <?php 
                        if(mysqli_num_rows($resultado_clientes) > 0){
                            while($row = mysqli_fetch_array($resultado_clientes)){
                                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                            }
                        }
                    ?>
                </select>

                <select name="acomodacao" id="">
                    <?php 
                        if(mysqli_num_rows($resultado_acomodacoes) > 0){
                            while($row = mysqli_fetch_array($resultado_acomodacoes)){
                                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                            }
                        }
                    ?>

                </select>
               
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
            <?php include 'rHospedagem.php'; ?>    
        <a href="../inicio.php">Voltar</a> </div>
    </div>
    
</body>
</html>