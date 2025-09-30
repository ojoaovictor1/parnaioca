<?php
session_start();
include "../config/conexao.php";

$id = $_GET['id'];

$sql_preencher_campos = "SELECT * FROM itens_frigobar WHERE id = $id";
$resultado = mysqli_query($con,$sql_preencher_campos);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item Frigobar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../estilo_inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
</head>
<body>
   
     <?php include '../include/menu.php'; ?>
    <main>
    <div id="container_item">
        <div id="topo">
            <ol id="breadcrumb">
                <li>
                    <a href="../inicio.php#cadastros">
                    <i class="fa-solid fa-user"></i>    
                    Cadastros</a>
                </li>
                <li>
                    <a href="../item_frigobar/index.php">Cadastrar Itens para o Frigobar</a>
                </li>
                <li>
                    Editar Item do Frigobar
                </li>
            </ol>
        </div>

        <div id="formulario_clientes">
            <h1>Editar Item do Frigobar</h1>
            <form action="uItem_frigobar.php" method="POST">
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                <input type="text" name="nome" class="form-control" placeholder="nome" value="<?php echo $row['nome']?>">
                <input type="number" name="preco" class="form-control" placeholder="preco" value="<?php echo $row['preco']?>">

                <select name="ativo" id="" class="form-control">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>

                <input type="submit" style='background-color: #ac7835' class="btn" value="Enviar">
            </form>
        </div>

        <div id="roda"> </div>
    </div>
    </main>    
</body>
</html>