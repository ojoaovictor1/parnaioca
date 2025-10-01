<nav id="sidebar" class="open-sidebar">
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
                        <a href="\parnaioca\app\inicio.php#inicio">
                            <i class="fa-solid fa-house"></i>
                            <span class="item-description">
                                Inicio
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="\parnaioca\app\inicio.php#cadastros">
                            <i class="fa-regular fa-circle-user"></i>
                            <span class="item-description">
                                Cadastros
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="\parnaioca\app\inicio.php#dashboard">
                            <i class="fa-solid fa-chart-line"></i>
                            <span class="item-description">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="\parnaioca\app\inicio.php#relatorios">
                            <i class="fa-regular fa-file"></i>
                            <span class="item-description">
                                Relatórios
                            </span>
                        </a>
                    </li>

                    <li class="side_item">
                        <a href="\parnaioca\app\inicio.php#intranet">
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