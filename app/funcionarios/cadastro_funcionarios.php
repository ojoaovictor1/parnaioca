<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../include/estilo.css">
</head>
<body> 

    <div id="formulario_funcionarios">
        <h1>Cadastrar Funcionários</h1>
        <form action="cFuncionarios.php" method="POST">
            
            <input type="text" name="nome" placeholder="nome">
            <input type="text" name="cargo" placeholder="cargo">
            <input type="text" name="poderes" placeholder="poderes">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="senha" placeholder="senha">
            <input type="submit">

        </form>
    </div>
    
</body>
</html>