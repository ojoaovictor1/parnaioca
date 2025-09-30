<?php
session_start();
include '../config/conexao.php';

$erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : '';
unset($_SESSION['erro']);

$id = $_GET['id'] ?? null;

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../estilo_inicio.css">
</head>
<body> 
    <?php include '../include/menu.php'; ?>
   
    <main>
    <div id="container_clientes">
        <div id="topo">
            <ol id="breadcrumb">
                <li>
                    <a href="../inicio.php#cadastros">
                    <i class="fa-solid fa-user"></i>    
                    Cadastros</a>
                </li>
                <li>
                    <a href="../clientes/index.php">Cadastrar Cliente </a>
                </li>
                <li>
                    Editar Cliente
                </li>
            </ol>
        </div>
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Cliente</h1>
            <?php if($erro) : ?>
                <p style="color: red;"><?= $erro ?></p>
            <?php endif; ?>
            <form action="uClientes.php" method="POST">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
                <input type="text" class="form-control" name="nome" placeholder="nome" value="<?php echo $row['nome']; ?>">
                <input type="date" class="form-control" name="data_nasc" value="<?php echo $row['data_nasc']; ?>">
                <input type="text" class="form-control" name="cpf" placeholder="CPF" oninput="formatarCPF(this)" maxlength="14" value="<?php echo $row['cpf']; ?>">
                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                <input type="text" class="form-control" name="telefone" placeholder="Telefone" maxlength="14" oninput="formatarTelefone(this)" value="<?php echo $row['telefone']; ?>">
                <input type="text" class="form-control" name="estado" placeholder="Estado" value="<?php echo $row['estado']; ?>">
                <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="<?php echo $row['cidade']; ?>">
                <select class="form-select" name="situacao" id="">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
                <input type="submit" class="btn" style='background-color: #ac7835' value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
    </div>
    </main>
    <script src="../../assets/mascaras.js"></script>
</body>
</html>