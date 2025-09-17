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
    <link rel="stylesheet" href="css/estilo.css">
    
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
                        <a href="#">
                            <i class="fa-solid fa-chart-line"></i>
                            <span class="item-description">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="#">
                            <i class="fa-regular fa-circle-user"></i>
                            <span class="item-description">
                                Cadastros
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="#">
                            <i class="fa-regular fa-file"></i>
                            <span class="item-description">
                                Relatórios
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="#">
                            <i class="fa-solid fa-chart-line"></i>
                            <span class="item-description">
                                Intranet
                            </span>
                        </a>
                    </li>
                </ul>
                <button id="open_btn">
                    <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            <div id="logout">
                <button id="logout_btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="item-description">
                        Sair
                    </span>
                </button>
            </div>
        </nav>
        <main>
            <h1>Teste dentro da main</h1>
        </main>

        <script src="script.js"></script>
</body>
</html>