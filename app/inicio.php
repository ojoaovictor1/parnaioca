<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="estilo_inicio.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                        <p class="card-text">Cadastrar um tipo de Acomodação</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Acomodações</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="acomodacoes/index.php"><i class="fa-solid fa-house"></i></a></h5>
                        <p class="card-text">Cadastrar Acomodação</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Itens para o Frigobar</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="item_frigobar/index.php"><i class="fa-solid fa-champagne-glasses"></i></a></h5>
                        <p class="card-text">Inserir Itens no Frigobar</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Estacionamento</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="vaga_estacionamento/index.php"><i class="fa-solid fa-car"></i></a></h5>
                        <p class="card-text">Alocar Vaga do Estacionamento</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Reserva</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="hospedagem/index.php"><i class="fa-solid fa-suitcase"></i></a></h5>
                        <p class="card-text">Fazer Reserva</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Frigobar</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="frigobar/index.php">Frigobar</a></h5>
                        <p class="card-text">Cadastrar Frigobar</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>
            </div>
        </section>

        <section id="dashboard">
            <div id="container_dashboard">
                <h1>Dashboard</h1>
                <p>Conteúdo do Dashboard</p>
                <?php include 'dashboard/rSaida_de_itens.php'; ?>
                <div id="cards_dashboard">
                    <div class="card text-bg-warning mb-3" style="max-width: 16rem">
                        <div class="card-header">Item com menor saída.</div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php
                                $resultado_menor = mysqli_query($con, $sql_menor);
                                $menor = mysqli_fetch_assoc($resultado_menor);
                                echo $menor['nome'];
                                ?>
                            </h5>
                            <p class="card-text"><?= $menor['quantidade_total'] . " Saídas" ?></p>
                        </div>
                    </div>

                    <div class="card text-bg-success mb-3" style="max-width: 16rem">
                        <div class="card-header">Item com maior saída.</div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php
                                $resultado_maior = mysqli_query($con, $sql_maior);
                                $maior = mysqli_fetch_assoc($resultado_maior);
                                echo $maior['nome'];
                                ?>
                            </h5>
                            <p class="card-text"><?= $maior['quantidade_total'] . " Saídas"?></p>
                        </div>
                    </div>

                    <div class="card text-bg-warning mb-3" style="max-width: 16rem">
                        <div class="card-header">Quarto menos Rentável</div>
                        <div class="card-body">
                            <h5 class="card-title">Nome do Quarto</h5>
                            <p class="card-text">Descrição</p>
                        </div>
                    </div>

                    <div class="card text-bg-success mb-3" style="max-width: 16rem">
                        <div class="card-header">Quarto mais Retável</div>
                        <div class="card-body">
                            <h5 class="card-title">Nome do Quarto</h5>
                            <p class="card-text">Descrição</p>
                        </div>
                    </div>

                </div>


                <div id="graficos_dashboard">
                    <div id="grafico1">
                        <?php include 'dashboard/rSaida_de_itens.php';
                                while($newRow = mysqli_fetch_assoc($resultado)){
                                    echo $newRow['nome'] . " " . $newRow['quantidade_total'] . "<br>";
                                }
                        ?>   
                        <canvas id="myChart"></canvas>
                        
                        <script>
                            const ctx = document.getElementById('myChart').getContext('2d');
                            const myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Item 1', 'Item 2', 'Item 3', 'Item 2'],
                                    datasets: [{
                                        label: 'Todos os Itens',
                                        data: [12, 19, 3, 5],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        
                    </div>

                    <div id="grafico2">
                        <canvas id="myChart2"></canvas>
                        
                        <script>
                            const ctx2 = document.getElementById('myChart2').getContext('2d');
                            const myChart2 = new Chart(ctx2, {
                                type: 'line',
                                data: {
                                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                    datasets: [{
                                        label: 'Quarto Menos Rentável',
                                        backgroundColor: 'rgb(255, 99, 132)',
                                        borderColor: 'rgb(255, 99, 132)',
                                        data: [0, 10, 5, 2, 20, 30, 45],

                                        
                                    },
                                    {
                                        label: 'Quarto Mais Rentável',
                                        backgroundColor: 'rgba(46, 132, 212, 1)',
                                        borderColor: 'rgba(46, 132, 212, 1)',
                                        data: [0, 15, 45, 9, 40, 5, 40],
                                    }
                                ]
                                },
                                options: {}
                            });
                        </script>
                </div>

                <div id="datatable_dashboard"></div>

            </div>
        </section>
        <section id="relatorios">
            

             <div id="card_topo"> 
                <h1>Relatórios</h1> 
                <p>Conteúdo do Relatório</p>
            </div>
            
            <div id="cards_content">
                <div class="card border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Período</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title">
                            <a href="relatorios/clientes_por_range_data.php">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </h5>
                        <p class="card-text">Clientes por Período</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Ativos e Inativos</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title">
                            <a href="relatorios/clientes_ativos_inativos.php">
                                <i class="fa-solid fa-user-clock"></i>
                            </a>
                        </h5>
                        <p class="card-text">Clientes Ativos e Inativos</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                <div class="card  border border-0 mb-3" style="max-width: 18rem;">
                    <div class="card-header ">Financeiro</div>
                    <div class="card-body  bg-warning">
                        <h5 class="card-title"><a href="acomodacoes/index.php"><i class="fa-solid fa-sack-dollar"></i></a></h5>
                        <p class="card-text">Relatório Financeiro</p>
                    </div>
                    <div class="card-footer bg-transparent ">Rodapé</div>
                </div>

                
            </div>
        
        </section>

        <section id="intranet">    
            <h1>Contatos</h1>
            <p>Conteúdo para a seção Contatos</p>

            <div id="container_contatos">
                 
                <div id="esquerda">
                    <div id="map"></div>
                </div>

                <div id="direita">
                    <div id="minicards">
                        <img src="../\assets/email-opened-svgrepo-com.svg" alt="" width="40px" height="40px">
                        <h5>Email:</h5>
                        <p>parnaioca@parnaioca.com</p>

                    </div>
                    <div id="minicards">
                        <img src="../assets/phone-calling-svgrepo-com.svg" alt="" width="40px" height="40px">
                        <h5>Telefone:</h5>
                        <p>+55 21973187499</p>
                    </div>

                    <div id="minicards">
                        <img src="../assets/location-pin-svgrepo-com.svg" alt="" width="40px" height="40px">
                        <h5>Endereço:</h5>
                        <p>Av. Governador Leonel, 7589.</p>
                    </div>

                    <div id="minicards">
                        <img src="../assets/instagram-svgrepo-com.svg" alt="" width="40px" height="40px">
                        <h5>Instagram:</h5>
                        <p>@parnaioca</p>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="assets/funcoes.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Verifica se o elemento #map existe
        const mapElement = document.getElementById('map');
        if (mapElement) {
            // Inicializa o mapa na latitude/longitude e com zoom 13
            var map = L.map('map').setView([-23.191563, -44.251623], 12); // Exemplo: Rio de Janeiro

            // Adiciona os tiles da OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Adiciona um marcador (opcional)
            L.marker([-23.191563, -44.251623]).addTo(map)
                .bindPopup('Parnaioca é Aqui!')
                .openPopup();
        } else {
            console.warn("Elemento #map não encontrado.");
        }
    });
</script>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
</body>
</html>