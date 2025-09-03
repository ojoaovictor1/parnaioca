<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_preencher = "SELECT * FROM funcionarios WHERE id = $id";
$resultado = mysqli_query($con,$sql_preencher);
$row = mysqli_fetch_array($resultado);

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
                <input type="text" name="nome" placeholder="nome" value="<?php echo $row['nome']; ?>">
                <input type="text" name="cargo" placeholder="cargo" value="<?php echo $row['cargo']; ?>">
                <input type="text" name="poderes" placeholder="poderes" value="<?php echo $row['poderes']; ?>">
                <input type="text" name="login" placeholder="Novo Login">
                <input type="text" name="senha" placeholder="Nova Senha">
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
        <a href="cadastro_funcionarios.php">Voltar</a> </div>
    </div>
    
</body>
</html>