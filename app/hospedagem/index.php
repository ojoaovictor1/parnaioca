<?php
session_start();
include '../config/conexao.php';

$erroItem = isset($_SESSION['erroItem']) ? $_SESSION['erroItem'] : '';
unset($_SESSION['erroItem']);

$sql_clientes = "SELECT * FROM clientes WHERE situacao = 1";
$resultado_clientes = mysqli_query($con,$sql_clientes);

$sql_acomodacoes = "SELECT * FROM acomodacoes WHERE situacao = 'Ativo'";
$resultado_acomodacoes = mysqli_query($con,$sql_acomodacoes);

$sql_itens = "SELECT * FROM itens_frigobar WHERE ativo = 'Ativo'";
$resultado_itens = mysqli_query($con, $sql_itens);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedagem</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Realizar Reserva</h1>
            <?php if($erroItem) : ?>
                <p style="color: red;"><?= $erroItem; ?></p>
            <?php endif; ?>
            <form action="cHospedagem.php" method="POST">
                
                <input type="date" name="data_checkin">
                <input type="date" name="data_checkout">

                <select name="cliente">
                    <?php 
                        if(mysqli_num_rows($resultado_clientes) > 0){
                            while($row = mysqli_fetch_array($resultado_clientes)){
                                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                            }
                        }
                    ?>
                </select>

                <select name="acomodacao" id="">
                    <?php 
                        if(mysqli_num_rows($resultado_acomodacoes) > 0){
                            while($row = mysqli_fetch_array($resultado_acomodacoes)){
                                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                            }
                        }
                    ?>

                </select>
               
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
            <?php include 'rHospedagem.php'; ?>  
            
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel-excluir" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel-excluir">Confirmar Exclusão</h1>
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
    document.getElementById('btnConfirmarExclusao').href = 'dHospedagem.php?id=' + jogadorId;
  });
</script>

<!-- Modal de Check-in -->

<div class="modal fade" id="checkin-modal" tabindex="-1" aria-labelledby="checkinModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="checkinModalLabel">Realizar Check-in</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form action="../checkin/cCheckin.php" method="POST">
                <input type="hidden" name="hospedagem_id" id="hospedagemId">
                <div class="mb-3">
                    <label for="clienteNome" class="col-form-label">Cliente:</label>
                    <input type="text" class="form-control" id="clienteNome" name="cliente_nome" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="acomodacaoNome" class="col-form-label">Acomodação:</label>
                    <input type="text" class="form-control" id="acomodacaoNome" name="acomodacao_nome" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="dataCheckin" class="col-form-label">Data de Check-in:</label>
                    <input type="date" class="form-control" id="dataCheckin" name="data_checkin" required>
                </div>
                <div class="mb-3">
                    <label for="horaCheckin" class="col-form-label">Hora de Check-in:</label>
                    <input type="time" class="form-control" id="horaCheckin" name="hora_checkin" required>
                </div>

                <div class="mb-3">
                    <label for="horaCheckin" class="col-form-label">Valor da Acomodação</label>
                    <input type="text" class="form-control" id="valor" name="valor" required disabled>
                </div>

                <button type="submit" class="btn btn-primary">Confirmar Check-in</button>
            </form>
        </div>
    </div>
    </div>
</div>
<script>
  const checkinModal = document.getElementById('checkin-modal');
    checkinModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const hospedagemId = button.getAttribute('data-id');
    const clienteNome = button.getAttribute('data-nome');
    const acomodacaoNome = button.getAttribute('data-acomodacao');
    const valorAcomodacao = button.getAttribute('data-valor');

    document.getElementById('hospedagemId').value = hospedagemId;
    document.getElementById('clienteNome').value = clienteNome;
    document.getElementById('acomodacaoNome').value = acomodacaoNome;
    document.getElementById('valor').value = valorAcomodacao;
    

    });
</script>

<!-- Modal de Check-out -->

<!-- <div class="modal fade" id="checkout-modal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="checkoutModalLabel">Realizar Check-out</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form action="../checkin/cCheckout.php" method="POST">
                <input type="hidden" name="hospedagem_id" id="hospedagemIdCheckout">
                <div class="mb-3">
                    <label for="clienteNome" class="col-form-label">Cliente:</label>
                    <input type="text" class="form-control" id="clienteNomeCheckout" name="cliente_nome" readonly>
                </div>
                <div class="mb-3">
                    <label for="acomodacaoNome" class="col-form-label">Acomodação:</label>
                    <input type="text" class="form-control" id="acomodacaoNomeCheckout" name="acomodacao_nome" readonly>
                </div>
                <div class="mb-3">
                    <label for="dataCheckin" class="col-form-label">Data de Check-out:</label>
                    <input type="date" class="form-control" id="dataCheckout" name="data_checkout" required>
                </div>
                <div class="mb-3">
                    <label for="horaCheckin" class="col-form-label">Hora de Check-out:</label>
                    <input type="time" class="form-control" id="horaCheckout" name="hora_checkout" required>
                </div>

                <div class="mb-3">
                    <label for="horaCheckin" class="col-form-label">Consumo do Frigobar</label>
                    <input type="text" class="form-control" id="valorCheckout" name="valor" required>
                </div>

                <button type="submit" class="btn btn-primary">Confirmar Check-out</button>
            </form>
        </div>
    </div>
    </div>
</div>
<script>
  const checkoutModal = document.getElementById('checkout-modal');
    checkoutModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const hospedagemId = button.getAttribute('data-id');
    const clienteNome = button.getAttribute('data-nome');
    const acomodacaoNome = button.getAttribute('data-acomodacao');
    const valorAcomodacao = button.getAttribute('data-valor');

    document.getElementById('hospedagemIdCheckout').value = hospedagemId;
    document.getElementById('clienteNomeCheckout').value = clienteNome;
    document.getElementById('acomodacaoNomeCheckout').value = acomodacaoNome;
    document.getElementById('valorCheckout').value = valorAcomodacao;
    

    });
</script> -->

<!-- Modal de Check-out -->
<div class="modal fade" id="checkout-modal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- modal-lg para mais espaço -->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="checkoutModalLabel">Realizar Check-out</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Formulário: Consumo Frigobar -->
          <div class="col-md-6 border-end pe-4">
            <h5>Consumo do Frigobar</h5>
            <form action="cConsumo_frigobar.php" method="POST" id="formFrigobar">
              <input type="hidden" name="id_hospedagem" id="frigobarHospedagemId" value="<?php echo $id_hospedagem; ?>">
              
              <div id="frigobar-itens-list">        
                
                <?php while($row = mysqli_fetch_assoc($resultado_itens)): ?>
                    
                    <label class="col-form-label"><?php echo $row['nome']; ?> (R$ <?php echo $row['preco']; ?>)</label>
                    <input type="number" class="form-control" name="itens[<?php echo $row['id']; ?>]" value="0" min="0"><br>
                    
                    
                    <?php endwhile; ?>

              </div>

              <input type="submit" class="btn btn-secondary mt-2" value="Enviar nota para o checkout">
            </form>
          </div>

          <!-- Formulário: Check-out -->
          <div class="col-md-6 ps-4">
            <h5>Dados do Check-out</h5>
            <form action="../checkin/cCheckout.php" method="POST">
              <input type="hidden" name="hospedagem_id" id="hospedagemIdCheckout">

              <div class="mb-3">
                <label for="clienteNome" class="col-form-label">Cliente:</label>
                <input type="text" class="form-control" id="clienteNomeCheckout" name="cliente_nome" readonly>
              </div>

              <div class="mb-3">
                <label for="acomodacaoNome" class="col-form-label">Acomodação:</label>
                <input type="text" class="form-control" id="acomodacaoNomeCheckout" name="acomodacao_nome" readonly>
              </div>

              <div class="mb-3">
                <label for="dataCheckout" class="col-form-label">Data de Check-out:</label>
                <input type="date" class="form-control" id="dataCheckout" name="data_checkout" required>
              </div>

              <div class="mb-3">
                <label for="horaCheckout" class="col-form-label">Hora de Check-out:</label>
                <input type="time" class="form-control" id="horaCheckout" name="hora_checkout" required>
              </div>

              <div class="mb-3">
                <label for="valorCheckout" class="col-form-label">Consumo do Frigobar (R$):</label>
                <input type="text" class="form-control" id="valorCheckout" name="valor" required>
              </div>

              <button type="submit" class="btn btn-primary">Confirmar Check-out</button>
            </form>
          </div>
        </div> <!-- .row -->
      </div> <!-- .modal-body -->
    </div>
  </div>
</div>

<script>
  const checkoutModal = document.getElementById('checkout-modal');
  checkoutModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;

    const hospedagemId = button.getAttribute('data-id');
    const clienteNome = button.getAttribute('data-nome');
    const acomodacaoNome = button.getAttribute('data-acomodacao');
    const valorAcomodacao = button.getAttribute('data-valor');

    // Preencher dados do formulário de check-out
    document.getElementById('hospedagemIdCheckout').value = hospedagemId;
    document.getElementById('clienteNomeCheckout').value = clienteNome;
    document.getElementById('acomodacaoNomeCheckout').value = acomodacaoNome;
    document.getElementById('valorCheckout').value = valorAcomodacao;

    // Preencher o campo hidden do formulário de frigobar
    document.getElementById('frigobarHospedagemId').value = hospedagemId;

    // (Opcional) Você pode buscar os itens via AJAX e preencher a div `#frigobar-itens-list`
  });
</script>



        <a href="../inicio.php">Voltar</a> </div>
    </div>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> 
</body>
</html>