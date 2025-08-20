<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Cliente</h1>
            <form action="uClientes.php" method="POST">
                <input type="text" name="nome" placeholder="nome">
                <input type="date" name="data_nasc">
                <input type="text" name="cpf" placeholder="CPF">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="telefone" placeholder="Telefone">
                <input type="text" name="estado" placeholder="Estado">
                <input type="text" name="cidade" placeholder="Cidade">
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
        <a href="../funcionarios/inicio.php">Voltar</a> </div>
    </div>
    
</body>
</html>