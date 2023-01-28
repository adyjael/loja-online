


<section class="container mt-5">
    <h3 class="text-center">Encomendas</h3>
<table class="table table-striped ">
    <thead>
        <tr>
            <th scope="col">Comprador</th>
            <th scope="col">Morada</th>
            <th scope="col">Produto</th>
            <th scope="col">QTD</th>
            <th scope="col">Preco</th>
            <th scope="col">data</th>
        </tr>
    </thead>
    <tbody>
      <?php if($encomendas != []): ?>
        
    <?php foreach($encomendas as $encomenda): ?>
    <tr>
      <th scope="row"><?= ucfirst($encomenda["nomeComprador"]) ?></th>
      <td><?= $encomenda["morada"] ?></td>
      <td><?= $encomenda["produto"] ?></td>
      <td><?= $encomenda["quantidadeComprada"] ?></td>
      <td><?= $encomenda["precoTotal"] ?>€</td>
      <td><?= $encomenda["data"] ?></td>
    </tr>
    
    <?php endforeach ?>
    <?php endif; ?>
    
  </tbody>
</table>
</section>