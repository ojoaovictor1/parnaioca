<?php
session_start();
include '../config/conexao.php';
$erroa = isset($_SESSION['erroa']) ? $_SESSION['erroa'] : '';
unset($_SESSION['erroa']);

$sql_consulta_tipo = "SELECT * FROM tipo_da_acomodacao";
$resultado = mysqli_query($con,$sql_consulta_tipo);
$total_registros = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acomodações</title>
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
                    Cadastrar Acomodações
                </li>
            </ol>
        </div>

        <div id="formulario_clientes">
            <h1>Cadastro de Acomodações</h1>
            <?php if($erroa) : ?>
                <p style="color: red;"><?= $erroa; ?></p>
            <?php endif; ?>
            <form action="cAcomodacoes.php" method="POST">
                <input type="text" class="form-control" name="nome" placeholder="nome">
                <input type="number" class="form-control" name="numero" placeholder="numero">
                <input type="text" class="form-control" name="valor" placeholder="valor" oninput="formatarMoeda(this)">
                <input type="number" class="form-control" name="capacidade" placeholder="capacidade">

                <select name="tipo" id="" class="form-control">
                    <?php 
                        if($total_registros > 0){
                            while($row = mysqli_fetch_array($resultado)){
                                echo '<option value="' . $row['id'] . '">' . $row['tipo'] . '</option>';

                            }
                        }
                    ?>   
                </select>

                <input type="submit" class="btn form-control" style='background-color: #ac7835' value="Enviar">
            </form>
        </div>

        <div id="roda"> 
            <?php include 'rAcomodacoes.php'; ?>

            <!-- modal de exclusão -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Exclusão</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o(a) <strong id="nomeJogador"></strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a class="btn btn-danger" id="btnConfirmarExclusao">Excluir</a>
                    </div>
                    </div>
                </div>
            </div>

            <script>
                const exampleModal = document.getElementById('exampleModal');
                exampleModal.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget; // Botão que disparou
                    const jogadorId = button.getAttribute('data-id');
                    const jogadorNome = button.getAttribute('data-nome');

                    document.getElementById('nomeJogador').textContent = jogadorNome;
                    document.getElementById('btnConfirmarExclusao').href = 'dAcomodacoes.php?id=' + jogadorId;
                });
            </script>
            <a href="../inicio.php#cadastros">Voltar</a> </div>
    </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="../../assets/novas_mascaras.js"></script>
</body>
</html>