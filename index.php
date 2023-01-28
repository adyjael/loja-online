<?php

use CoffeeCode\Router\Router;

require_once "./vendor/autoload.php";
session_start();
//session_destroy();

$routas = new Router(URL_BASE);

$routas->namespace("App\Controllers");

$routas->group(NULL);

$routas->get("/","HomeController:home");
$routas->get("/carrinho","HomeController:carrinho");
$routas->get("/confirma-pedido","HomeController:confirmarPedido");
$routas->get("/aumantarQuantidade","HomeController:aumantarQuantidade");
$routas->get("/diminuirQuantidade","HomeController:diminuirQuantidade");
$routas->get("/limparCarrinho","HomeController:limparCarrinho");
$routas->get("/confirmar-pedido","HomeController:confirmarPedido");
$routas->get("/confirmar-encomenda","HomeController:paginaConfirmarPedido");
$routas->get("/success","HomeController:success");


$routas->post("/adicionarCarrinho","HomeController:adicionar_carinho");
$routas->post("/inserirEncomenda","HomeController:inserirEncomenda");
$routas->post("/eliminarProduto","HomeController:eliminarProduto");


// Routas do admin
$routas->get("/admin","AdminController:index");
$routas->get("/admin/encomendas","AdminController:encomendas");

$routas->post("/login","AdminController:login");
$routas->post("/novo-produto","AdminController:novoProduto");
$routas->post("/editarProduto","AdminController:editarProduto");
$routas->post("/atualizar-produto","AdminController:atualizarProduto");
$routas->post("/adminEliminarProduto","AdminController:eliminarProduto");



$routas->dispatch();