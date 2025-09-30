<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_preencher_campos = "SELECT * FROM acomodacoes WHERE id = $id";
$resultado_preencher = mysqli_query($con, $sql_preencher_campos);
$row = mysqli_fetch_assoc($resultado_preencher);

$sql_consulta_tipo = "SELECT * FROM tipo_da_acomodacao";
$resultado = mysqli_query($con,$sql_consulta_tipo);
$total_registros = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Acomodações</title>
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../estilo_inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
   <?php include '../include/menu.php'; ?>

    <main>
    <div id="container_acomodacoes">
        <div id="topo">
            <ol id="breadcrumb">
                <li>
                    <a href="../inicio.php#cadastros">
                    <i class="fa-solid fa-user"></i>    
                    Cadastros</a>
                </li>
                <li>
                    <a href="../acomodacoes/index.php">Cadastrar Acomodação </a>
                </li>
                <li>
                    Editar Acomodação
                </li>
            </ol>
        </div>

        <div id="formulario_clientes">
            <h1>Editar Acomodação</h1>
            <form action="uAcomodacoes.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="nome" class="form-control" placeholder="nome" value="<?php echo $row['nome']; ?>">
                <input type="text" name="numero" class="form-control" placeholder="numero" value="<?php echo $row['numero']; ?>">
                <input type="text" name="valor" placeholder="valor" class="form-control" value="<?php echo $row['valor']; ?>">
                <input type="text" name="capacidade" class="form-control" placeholder="capacidade" value="<?php echo $row['capacidade']; ?>">

                <select name="tipo" id="" class="form-control">
                    <?php 
                        if($total_registros > 0){
                            while($row = mysqli_fetch_array($resultado)){
                                echo '<option value="' . $row['id'] . '">' . $row['tipo'] . '</option>';

                            }
                        }
                    ?>   
                </select>

                <select name="situacao" id="" class="form-control">
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
                <input type="submit" class="form-control" style='background-color: #ac7835' value="Enviar">

            </form>
        </div>

        <div id="roda"> 
        </div>
    </div>
    </main>
    
</body>
</html>