<?php
    include_once("../includes/Cabecalho.php");
    require_once("../model/EventoDAO.php");

    $meuEventoDAO = new EventoDAO();

    unset($_SESSION["id_evento"]);// Estamos destruindo a variável de sessão que está sendo criada na página atualizarEventoView, de forma que outros valores possam ser atribuídos a ela.
?>

<main class="container-fluid mt-5">
    <section class="d-flex justify-content-between">
        <h3 class="fw-bold">Gerenciamento de Eventos</h3>
        <a href="CadastroView.php" class="btn btn-primary">Criar Evento</a>        
    </section>
    <hr>

    <section class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 ">
      <?php
        if($meuEventoDAO->consultar()):
          foreach($meuEventoDAO->consultar(true) as $elemento):
              
      ?>
      <section>
        <div class="card h-100">
          <img src=<?=$elemento["foto_evento"] ?> alt="" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-center"><?=ucfirst($elemento["nome_evento"])?></h5>
            <p class="card-text">O evento ocorrerá na data: <?=$elemento["data_evento"]?></p>
          </div>

          <div class="card-footer">
            <form action="AtualizarEventoView.php" method="post" class="d-flex justify-content-around">

              <button type="submit" class="btn btn-info col-5 d-flex justify-content-center align-items-center">
                Editar <span class="material-symbols-outlined ms-2">edit</span>
              </button>
              <!-- O campo hidden irá armazenar, de forma oculta, o id de cada item do banco de dados -->
              <input type="hidden" name="id_evento" value="<?=$elemento['id_evento']?>">

              <button type="button" class="btn btn-danger col-5 d-flex justify-content-center align-items-center excluir" data-bs-toggle="modal" data-bs-target="#modalExcluir" id="<?=$elemento['id_evento']?>">
                Excluir <span class="material-symbols-outlined ms-2">delete</span>
              </button>

            </form>
          </div>
        </div>
      </section>
      <?php
          endforeach;
        endif;
      ?>
    </section>
</main>    

<!-- Modal para Excluir -->
<section class="modal fade" id="modalExcluir">
  <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Atenção</h5>
              <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form action="../controller/EventoController.php" method="post">
            <div class="modal-body">
                Tem certeza que deseja excluir esse evento?
                <input type="hidden" name="excluir" id="excluirEvento">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" id="confirmar">Confirmar</button>
            </div>

          </form>
        </div>
  </div>
</section>
<?php
    include_once("../includes/Rodape.php");
?>