<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_preencher_campos_editar = "SELECT * FROM clientes WHERE id = $id";
$resultado = mysqli_query($con,$sql_preencher_campos_editar);
$row = mysqli_fetch_assoc($resultado);
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
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="nome" placeholder="nome" value="<?php echo $row['nome']; ?>">
                <input type="date" name="data_nasc" value="<?php echo $row['data_nasc']; ?>">
                <input type="text" name="cpf" placeholder="CPF" value="<?php echo $row['cpf']; ?>">
                <input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $row['telefone']; ?>">
                <input type="text" name="estado" placeholder="Estado" value="<?php echo $row['estado']; ?>">
                <input type="text" name="cidade" placeholder="Cidade" value="<?php echo $row['cidade']; ?>">
                <select name="situacao" id="">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
        <a href="index.php">Voltar</a> </div>
    </div>
    
</body>
</html>