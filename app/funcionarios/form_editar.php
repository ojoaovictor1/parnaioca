<?php
session_start();

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Funcionario</h1>
            <form action="uFuncionarios.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="nome" placeholder="nome">
                <input type="text" name="cargo" placeholder="cargo">
                <input type="text" name="poderes" placeholder="poderes">
                <input type="text" name="login" placeholder="login">
                <input type="text" name="senha" placeholder="senha">
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
        <a href="cadastro_funcionarios.php">Voltar</a> </div>
    </div>
    
</body>
</html>