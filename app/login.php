<?php
require 'function.php';
    $erro = null;
    $sucesso = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="include/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div id="container">
        <div id="lado_esquerdo">
            <div id="logo"></div>
                <div id="formulario">
                    <img src="parnaioca-logo-menor.png" class="mb-4" width="300px" alt="">
                    <form action="logar.php" method="POST">
                        <input type="text" name="login" placeholder="Login"><br>
                        <input type="password" name="password" placeholder="senha"><br>
                        <input type="submit" value="Enviar">
                    </form>

                    <div id="mensagem">
                    <?php if(exibirErro($erro)) : ?>
                        <p style="color: red">
                            <?= $erro; ?>
                        </p>
                    <?php endif; ?>

                    <?php if(exibirErro($sucesso)) :?>
                        <p style="color: green">
                            <?= $sucesso; ?>
                        </p>
                    <?php endif; ?>
                    </div>
            </div>
            <div id="baixo">
                <a href="funcionarios/cadastro_funcionarios.php">Cadastrar Funcionário</a>
            </div>
        </div>

        <div id="lado_direito">
            
        </div>
    </div>
</body>
</html>