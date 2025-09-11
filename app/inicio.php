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
    <link rel="stylesheet" href="estilo.css">
    
</head>
</head>
<body>
   

    <div id="container">
        <div id="">
        
            <li><a href="clientes/index.php">Cadastrar clientes</a></li>
            <li><a href="tipo_acomodacao/index.php">Cadastrar o Tipo de Acomodação</a></li>
            <li><a href="acomodacoes/index.php">Cadastrar Acomodações</a></li>
            <li><a href="item_frigobar/index.php">Cadastrar itens para o frigobar</a></li>
            <li><a href="vaga_estacionamento">Cadastrar Vaga no Estacionamento</a></li>
            <li><a href="hospedagem/index.php">Cadastrar Hospedagem</a></li>
            <li><a href="frigobar/index.php">Cadastrar Frigobar</a></li>
            <li><a href="relatorios/index.php">Relatórios</a></li>
                       
        </div>

        <div id="topo">
            Bem Vindo!!! <?= $_SESSION['login']; ?> - <?= $_SESSION['cargo']; ?> - <?= $_SESSION['poderes']; ?>
            <a href="logout.php">Sair</a>
        </div>

        
        <!-- CARD -->
        <div id="cont">
            <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                <div class="card-header ">Clientes</div>
                <div class="card-body  bg-warning">
                    <h5 class="card-title"><a href="clientes/index.php"><i class="fa-solid fa-user"></i></a></h5>
                    <p class="card-text">Cadastrar Usuário</p>
                </div>
                <div class="card-footer bg-transparent ">Rodapé</div>
            </div>

            <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                <div class="card-header ">Tipo de acomodação</div>
                <div class="card-body  bg-warning">
                    <h5 class="card-title"><a href="clientes/index.php">Tipo de Acomodação</a></h5>
                    <p class="card-text">Vou colocar um ícone de USER</p>
                </div>
                <div class="card-footer bg-transparent ">Rodapé</div>
            </div>

            <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                <div class="card-header ">Acomodações</div>
                <div class="card-body  bg-warning">
                    <h5 class="card-title"><a href="clientes/index.php"><i class="fa-solid fa-house"></i></a></h5>
                    <p class="card-text">Cadastrar Acomodação</p>
                </div>
                <div class="card-footer bg-transparent ">Rodapé</div>
            </div>

            <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                <div class="card-header ">Itens para o Frigobar</div>
                <div class="card-body  bg-warning">
                    <h5 class="card-title"><a href="clientes/index.php"><i class="fa-solid fa-champagne-glasses"></i></a></h5>
                    <p class="card-text">Inserir Itens no Frigobar</p>
                </div>
                <div class="card-footer bg-transparent ">Rodapé</div>
            </div>

            <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                <div class="card-header ">Estacionamento</div>
                <div class="card-body  bg-warning">
                    <h5 class="card-title"><a href="clientes/index.php"><i class="fa-solid fa-car"></i></a></h5>
                    <p class="card-text">Alocar Vaga do Estacionamento</p>
                </div>
                <div class="card-footer bg-transparent ">Rodapé</div>
            </div>

            <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                <div class="card-header ">Reserva</div>
                <div class="card-body  bg-warning">
                    <h5 class="card-title"><a href="clientes/index.php"><i class="fa-solid fa-suitcase"></i></a></h5>
                    <p class="card-text">Fazer Reserva</p>
                </div>
                <div class="card-footer bg-transparent ">Rodapé</div>
            </div>

            <div class="card  border=border-0 mb-3" style="max-width: 18rem;">
                <div class="card-header ">Frigobar</div>
                <div class="card-body  bg-warning">
                    <h5 class="card-title"><a href="clientes/index.php">Frigobar</a></h5>
                    <p class="card-text">Vou colocar um ícone de USER</p>
                </div>
                <div class="card-footer bg-transparent ">Rodapé</div>
            </div>
        </div>
        <div id="roda"></div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> 
</body>
</html>