<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="include/estilo.css">
</head>
<body>

    <div id="container">
        <div id="lado_esquerdo">
            <div id="logo"></div>
            <div id="formulario">

                <form action="logar.php" method="POST">
                    <input type="text" name="login" placeholder="Login"><br>
                    <input type="password" name="password" placeholder="senha"><br>
                    <input type="submit" value="Enviar">
                </form>

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