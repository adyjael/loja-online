<section class="produtos mt-5">
  <div class="produtos-header">
    <h3>Produtos cadastrados</h3>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novo-produto">
      Novo produto
    </button>
  </div>

  <div class="card-produtos">

    <?php foreach ($produtos as $produto) : ?>

      <div data-aos="fade-up" class="produto animate__animated animate__fadeInLeft">
        <img src="<?= URL_BASE ?>/<?= $produto["imagem"] ?>" alt="<?= $produto["nome"] ?>">
        <span class="produto-categoria">Mercearia</span>
        <p><?= $produto["nome"] ?></p>
        <div class="produtos-preco w-75">
          <span id="preco"><?= $produto["preco"] ?> €</span>
          <span>QTD: <?= $produto["quantidades"] ?></span>
          <button onclick="editarProduto(<?= $produto['id'] ?>)">Editar</button>
          <button onclick="eliminarProduto(<?= $produto['id'] ?>)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
      </div>

    <?php endforeach; ?>




  </div>

</section>










<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="novo-produto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= URL_BASE ?>/novo-produto" id="form-adicionar-produto" enctype="multipart/form-data" class="row" method="POST">

          <div class="col-md-12 mt-2">
            <label for="nome">Nome do produto</label>
            <input class="form-control" type="text" name="nome-produto" id="nome-produto" placeholder="Digite aqui o nome do produto">
          </div>
          <div class="col-md-12 mt-2">
            <label for="descricao">Descrição do produto</label>
            <input class="form-control" type="text" name="descricao-produto" id="descricao-produto" placeholder="Digite aqui a descrição do produto">
          </div>
          <div class="col-md-12 mt-2">
            <label for="imagem">Imagem dp produto</label>
            <input class="form-control" type="file" name="imagem-produto" id="imagem-produto" placeholder="Digite aqui o imagem do produto">
          </div>
          <div class="col-md-12 mt-2">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" type="number" name="quantidade-produto" id="quantidade-produto" placeholder="Digite aqui a quantidade do produto">
          </div>
          <div class="col-md-12 mt-2">
            <label for="preco">Preco</label>
            <input class="form-control" type="text" name="preco-produto" id="preco-produto" placeholder="Digite aqui o preço do produto">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>







<!-- Modal editar produto -->
<div class="modal fade" id="editar-produto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= URL_BASE ?>/atualizar-produto" id="form-editar-produto" enctype="multipart/form-data" class="row" method="POST">
          <input type="hidden" id="id-produto" name="id-produto">
          <div class="col-md-12 mt-2">
            <label for="nome">Nome do produto</label>
            <input class="form-control" type="text" name="nome-produto" id="nome-produto" placeholder="Digite aqui o nome do produto">
          </div>
          <div class="col-md-12 mt-2">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" type="number" name="quantidade-produto" id="quantidade-produto" placeholder="Digite aqui a quantidade do produto">
          </div>
          <div class="col-md-12 mt-2">
            <label for="preco">Preco</label>
            <input class="form-control" type="text" name="preco-produto" id="preco-produto" placeholder="Digite aqui o preço do produto">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= URL_BASE ?>/assets/js/script.js"></script>


</body>

</html>