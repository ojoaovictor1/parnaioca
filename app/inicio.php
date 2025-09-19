<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="estilo_inicio.css">
</head>
<body>
    
    <nav id="sidebar">
            <div id="sidebar_content">
                <div id="user">
                    <img src="messi.webp" id="user_avatar" alt="User" width="70px">

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
                <button id="open_btn">
                    <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
                </button>
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

    <!-- Conteúdo principal -->
    <main>
        <section id="inicio">
            <h1>Início</h1>
            <p>Conteúdo para a seção início</p>
        </section>

        <section id="cadastros">

            <div id="card_topo"> 
                <h1>Cadastros</h1> 
                <p>conteudo do cadastro</p>
            </div>
            
            <div id="cards_content">
                <div class="card border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Clientes</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title">
                            <a href="clientes/index.php">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </h5>
                        <p class="card-text">Cadastrar Cliente</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Tipo de acomodação</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title">
                            <a href="tipo_acomodacao/index.php">
                                Tipo de Acomodação
                            </a>
                        </h5>
                        <p class="card-text">Vou colocar um ícone de USER</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Acomodações</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="acomodacoes/index.php"><i class="fa-solid fa-house"></i></a></h5>
                        <p class="card-text">Cadastrar Acomodação</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Itens para o Frigobar</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="item_frigobar/index.php"><i class="fa-solid fa-champagne-glasses"></i></a></h5>
                        <p class="card-text">Inserir Itens no Frigobar</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Estacionamento</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="vaga_estacionamento/index.php"><i class="fa-solid fa-car"></i></a></h5>
                        <p class="card-text">Alocar Vaga do Estacionamento</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Reserva</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="hospedagem/index.php"><i class="fa-solid fa-suitcase"></i></a></h5>
                        <p class="card-text">Fazer Reserva</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Frigobar</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="frigobar/index.php">Frigobar</a></h5>
                        <p class="card-text">Vou colocar um ícone de USER</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>
            </div>
        </section>

         <section id="dashboard">
            <h1>Dashboard</h1>
            <p>Conteúdo para a Dashboard</p>
        </section>
        <section id="relatorios">
            <h1>Relatórios</h1>
            <p>Conteúdo para Relatórios</p>
        </section>
        <section id="intranet">
            <h1>Contatos</h1>
            <p>Conteúdo para a seção contatos</p>
        </section>

        <section id="cadastro_auxiliar">
                <!-- Aqui o AJAX vai injetar o conteúdo -->
        </section>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="assets/funcoes.js"></script>
</body>
</html>