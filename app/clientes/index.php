<?php
session_start();
$erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : '';
unset($_SESSION['erro']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../estilo_inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    
    <?php include '../include/menu.php'; ?>
    <main>
    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">

            <h1>Cadastro de Clientes</h1>
            
            <?php if($erro) : ?>
                <p style="color: red;"><?= $erro ?></p>
            <?php endif; ?>
            <form action="cClientes.php" method="POST" id="form">
                <input type="text" name="nome" placeholder="nome" pattern="[a-zA-Z\s]+">
                <input type="date" name="data_nasc" id="data_nasc">
                <input type="text" name="cpf" placeholder="CPF" id="cpf" maxlength="14" oninput="formatarCPF(this)" id="cpf">
                <input type="text" name="email" placeholder="Email" id="email" class="inputs required">
                <input type="text" name="telefone" placeholder="Telefone" id="telefone" maxlength="14" oninput="formatarTelefone(this)">
                <input type="text" name="estado" placeholder="Estado" id="estado">
                <input type="text" name="cidade" placeholder="Cidade" id="cidade"> 
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
            <?php include 'rClientes.php'; ?>
        </div>    
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
                    document.getElementById('btnConfirmarExclusao').href = 'dClientes.php?id=' + jogadorId;
                });
            </script> 
        
    </div>
    </main>
    <a href="../inicio.php#cadastros">Voltar</a>

<script>
    document.addEventListener("submit", function(e) {
    if (e.target && e.target.id === "formFiltro") {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch("rClientes.php", {
            method: "POST",
            body: formData
        })
        .then(resp => resp.text())
        .then(html => {
            document.getElementById("roda").innerHTML = html;
        })
        .catch(err => console.error("Erro no AJAX:", err));
    }
});
</script>

    <script src="../scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="../../assets/mascaras.js"></script>
    <script src="../../assets/validacao.js"></script>
</body>
</html>