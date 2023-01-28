<div class="carinho animate__animated animate__fadeInLeft">
    <div class="header-carinho">
        <h2>Seu carrinho</h2>
        <a class="btn-voltar" href="<?= URL_BASE ?>/limparCarrinho">Limpar carrinho</a>
    </div>
    <div class="section-pedidos">

        <div class="pedidos-selecionados">

            <div>
                <?php if ($carrinho != []) : ?>

                    <?php for ($i = 0; $i < count($carrinho) - 1; $i++) : ?>
                        <div class="produtos-selecionados">
                            <div class="img-final">
                                <img src="<?= $carrinho[$i]["imagem"] ?>" alt="<?= $carrinho[$i]["titulo"] ?>">
                            </div>
                            <div class="produtos-preco-final">
                                <span><?= $carrinho[$i]["titulo"] ?></span>
                                <span id="preco-final"><?= $carrinho[$i]["preco_original"] ?> €</span>
                                <form>
                                    <input type="button" onclick="diminuir_quantidade_produto(<?= $carrinho[$i]['id_produto'] ?>,this)" id="menos" value="-">
                                    <span class="quantidade"><?= $carrinho[$i]["quantidade"] ?></span>
                                    <input type="button" onclick="aumentar_quantidade_produto(<?= $carrinho[$i]['id_produto'] ?>,this)" id="mais" value="+" style="margin-right: 30px;">
                                    <button type="button" onclick="eliminar_do_carrinho(<?= $carrinho[$i]['id_produto'] ?>)">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php else : ?>
                <?php endif; ?>

            </div>
            <div>
                <div class="informacao-final">
                    <div>
                        <h3>Total</h3>
                        <span id="precoTotal"><?= end($carrinho) ?>€</span>
                    </div>
                    <button id="btn-confirmar-pedido" type="button">Confirmar pedido</button>
                </div>
            </div>
            
                    <!-- <pre>
                        <?php   print_r($_SESSION["dados_temp"]); ?>

                    </pre> -->

        </div>
    </div>

</div>