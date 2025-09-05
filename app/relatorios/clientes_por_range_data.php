<?php
session_start();
include '../config/conexao.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">

            <h1>Clientes por Range de Datas</h1>
            <form action="buscar_clientes.php" method="POST">
                <label for="entrada">Data de Entrada.</label>
                <input type="date" name="entrada">

                <label for="saida">Data de Saída.</label>
                <input type="date" name="saida">
                <input type="submit" value="Buscar">
            </form>
        </div>

        <div id="roda"> <?php include 'buscar_clientes.php'; ?>
            <a href="index.php">Voltar</a>
        </div>
    </div>
    
</body>
</html>