<?php 
session_start();
$erroItem = isset($_SESSION['erroItem']) ? $_SESSION['erroItem'] : '';
unset($_SESSION['erroItem']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens para o Frigobar</title>
    <link rel="stylesheet" href="../include/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav id="sidebar">
            <div id="sidebar_content">
                <div id="user">
                    <img src="../messi.webp" id="user_avatar" alt="User" width="70px">

                    <p id="user_infos">
                        <span class="item-description">
                            <?= $_SESSION['login']; ?> <br>
                            
                            
                        </span>
                        <span class="item-description">
                            <?= $_SESSION['cargo']; ?> <?= $_SESSION['poderes']; ?>
                        </span>
                    </p>
                </div>
                <ul id="side_itens">
                    <li class="side_item active">
                        <a href="#inicio">
                            <i class="fa-solid fa-house"></i>
                            <span class="item-description">
                                Inicio
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="#cadastros">
                            <i class="fa-regular fa-circle-user"></i>
                            <span class="item-description">
                                Cadastros
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="#dashboard">
                            <i class="fa-solid fa-chart-line"></i>
                            <span class="item-description">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="#relatorios">
                            <i class="fa-regular fa-file"></i>
                            <span class="item-description">
                                Relatórios
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="#intranet">
                            <i class="fa-solid fa-address-book"></i>
                            <span class="item-description">
                               Contatos
                            </span>
                        </a>
                    </li>
                </ul>
                <!--<button id="open_btn">
                    <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
                </button>-->
            </div>
            <div id="logout">
                <a href="logout.php"> <button id="logout_btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="item-description">
                      Sair
                    </span>
                </button></a>
            </div>
    </nav>

    <main>
    <div id="topo">
        <h1>Cadastro de Itens para o Frigobar</h1>
    </div>

    <div id="formulario_clientes">
        <?php if($erroItem) : ?>
            <p style="color: red;"><?= $erroItem; ?></p>
        <?php endif; ?>
    <form action="cItem_frigobar.php" method="POST">
        
        <input type="text" id="nome" name="nome" placeholder="nome"><br>
        <input type="number" id="preco" name="preco" placeholder="preco"><br>
        
        <input type="submit" value="Cadastrar Item">
    </form>
    </div>

    <div id="roda">
        <?php include 'rItem_frigobar.php'; ?>

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
    const button = event.relatedTarget;
    const jogadorId = button.getAttribute('data-id');
    const jogadorNome = button.getAttribute('data-nome');

    document.getElementById('nomeJogador').textContent = jogadorNome;
    document.getElementById('btnConfirmarExclusao').href = 'dItem_frigobar.php?id=' + jogadorId;
  });
</script>

        <a href="../inicio.php#cadastros">Voltar</a>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>