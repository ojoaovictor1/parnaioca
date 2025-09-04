<?php
session_start();
$erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : '';
unset($_SESSION['erro']);

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

            <h1>Cadastro de Clientes</h1>
            
            <?php if($erro) : ?>
                <p style="color: red;"><?= $erro ?></p>
            <?php endif; ?>
            <form action="cClientes.php" method="POST" id="form">
                <input type="text" name="nome" placeholder="nome">
                <input type="date" name="data_nasc" id="data_nasc">
                <input type="text" name="cpf" placeholder="CPF" id="cpf" maxlength="14" oninput="formatarCPF(this)" id="cpf">
                <input type="text" name="email" placeholder="Email" id="email" class="inputs required">
                <input type="text" name="telefone" placeholder="Telefone" id="telefone" maxlength="14" oninput="formatarTelefone(this)">
                <input type="text" name="estado" placeholder="Estado" id="estado">
                <input type="text" name="cidade" placeholder="Cidade" id="cidade"> 
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
            <?php include 'rClientes.php'; ?>    
        <a href="../inicio.php">Voltar</a> </div>
    </div>
    <script src="../../assets/mascaras.js"></script>
    <script src="../../assets/validacao.js"></script>
</body>
</html>