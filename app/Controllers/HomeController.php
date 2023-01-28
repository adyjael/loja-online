<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Produtos;

class HomeController extends Web
{
    public $dados;

    public function home()
    {
        unset($_SESSION["dono-loja"]);
        $produtos = Admin::selecionarTodosProdutos();
        $this->view([
            "header",
            "home",
            "footer"
        ], [
            "produtos" => $produtos,
        ]);
    }


    public function carrinho()
    {
        unset($_SESSION["dono-loja"]);
        if (!isset($_SESSION["carrinho"]) || count($_SESSION["carrinho"]) == 0) {

            $this->view([
                "header",
                "carrinho_vazio",
                "footer"
            ]);
        } else {


            $ids = [];

            foreach ($_SESSION["carrinho"] as $id_produto => $quantidade_produto) {
                array_push($ids, $id_produto);
            }
            $ids = implode(",", $ids);


            $resultados = Produtos::buscar_produto_por_ids($ids);
            // dd($resultados);

            $dados_temp = [];
            foreach ($_SESSION["carrinho"] as $id_produto => $quantidade_carinho) {

                foreach ($resultados as $produto) {

                    if ($produto["id"] == $id_produto) {
                        $imagem = $produto["imagem"];
                        $nome_produdo = $produto["nome"];
                        $quantidade_temp = $quantidade_carinho;
                        $preco = $produto["preco"] * $quantidade_temp;


                        array_push($dados_temp, [
                            "imagem" => $imagem,
                            "titulo" => $nome_produdo,
                            "quantidade" => $quantidade_temp,
                            "id_produto" => $id_produto,
                            "preco" => $preco,
                            "preco_original" => $produto["preco"],
                        ]);

                        break;
                    }
                }
            }

            // Calcula total emcomenda
            $total_encomenda = 0;
            foreach ($dados_temp as $item) {
                $total_encomenda += $item["preco"];
            }
            $dados_temp["encomenda"] = $total_encomenda;

            $_SESSION["dados_temp"] = $dados_temp;


            $this->view([
                "header",
                "carrinho",
                "footer"
            ], [
                "carrinho" => $_SESSION["dados_temp"]
            ]);
        }
    }

    public function eliminarProduto($data)
    {
        unset($_SESSION["carrinho"][$data["id"]]);
        unset($_SESSION["dados_temp"]);
        $_SESSION["totalProdutos"] = $_SESSION["totalProdutos"] - 1;
    }
    public function adicionar_carinho($data)
    {
        $id_produto = $data["id"];

        $resultado = Produtos::verificar_stock_produto($id_produto);

        if ($resultado) {
            $carinho = [];
            if (isset($_SESSION["carrinho"])) {
                $carinho = $_SESSION["carrinho"];
            }

            if (key_exists($id_produto, $carinho)) {
                // Ja existe o produto
                $carinho[$id_produto];
            } else {
                // adicionar ao carinho
                $carinho[$id_produto] = 1;
            }

            $total_produtos = 0;
            foreach ($carinho as $protuto_quantidade) {
                $total_produtos += $protuto_quantidade;
            }
            $_SESSION["carrinho"] = $carinho;

            $_SESSION["totalProdutos"] =  count($carinho);
            echo json_encode(array("erro" => false, "msg" => count($carinho), "qtd" => $total_produtos));
        } else {
            echo json_encode(array("erro" => true, "msg" => "Não existe stok para este produto!"));
        }
    }

    public function inserirEncomenda($data)
    {

        $carinho = $_SESSION["dados_temp"];
        $morada = $data["rua"] . ", " . $data["cidade"] . ", " . $data["zip"];

        for ($i = 0; $i < count($carinho) - 1; $i++) {

            Produtos::novaCompra(ucfirst($data["nome"]), $data["dataNacimento"], ucwords($morada),  $carinho[$i]["id_produto"], $carinho[$i]["quantidade"], $carinho[$i]["preco"]);
        }


        // Produtos::novaCompra(ucfirst($data["nome"]), $data["dataNacimento"], ucwords($morada),  $data[$i]["id_produto"], $carinho[$i]["quantidade"], $data["preco"]);

    }

    public function aumantarQuantidade($data)
    {

        $id_produto  = ($_GET["id"]);
        $resultado = Produtos::verificar_stock_produto($id_produto);
        if ($resultado) {

            $carinho = $_SESSION["carrinho"];

            if (key_exists($id_produto, $carinho)) {
                $carinho[$id_produto]++;
            }
            $total_produtos = 0;
            foreach ($carinho as $protuto_quantidade) {
                $total_produtos += $protuto_quantidade;
            }
            $_SESSION["carrinho"] = $carinho;
            $_SESSION["totalProdutos"] = count($carinho);

            $total_encomenda = $_SESSION["dados_temp"]["encomenda"] + Produtos::buscar_preco_produto($id_produto);
            $_SESSION["dados_temp"]["encomenda"] =  $total_encomenda;

            for ($i = 0; $i < count($_SESSION["dados_temp"]) - 1; $i++) {
                if ($_SESSION["dados_temp"][$i]["id_produto"] == $id_produto) {
                    $_SESSION["dados_temp"][$i]["quantidade"]++;
                    $_SESSION["dados_temp"][$i]["preco"] = $_SESSION["dados_temp"][$i]["preco_original"] *  $_SESSION["dados_temp"][$i]["quantidade"];
                }
            }



            echo json_encode(array("erro" => false, "msg" => count($carinho), "precoTotal" => number_format($_SESSION["dados_temp"]["encomenda"], 2, ",", ".")));
        } else {
            echo json_encode(array("erro" => true, "msg" => "Não existe stok para este produto!"));
        }
    }

    public function diminuirQuantidade()
    {
        $id_produto  = ($_GET["id"]);
        $resultado = Produtos::verificar_stock_produto($id_produto);

        if ($resultado) {

            $carinho = $_SESSION["carrinho"];

            if (key_exists($id_produto, $carinho)) {
                $carinho[$id_produto]--;
            }
            $total_produtos = 0;
            foreach ($carinho as $protuto_quantidade) {
                $total_produtos += $protuto_quantidade;
            }
            $_SESSION["carrinho"] = $carinho;
            $_SESSION["totalProdutos"] = count($carinho);

            $total_encomenda = $_SESSION["dados_temp"]["encomenda"] - Produtos::buscar_preco_produto($id_produto);
            $_SESSION["dados_temp"]["encomenda"] =  $total_encomenda;

            echo json_encode(array("erro" => false, "precoTotal" => number_format($_SESSION["dados_temp"]["encomenda"], 2, ",", ".")));
        } else {
            echo json_encode(array("erro" => true, "msg" => "Não existe stok para este produto!"));
        }
    }

    public function limparCarrinho()
    {
        session_destroy();
        header("Location: " . URL_BASE . "/carrinho");
    }

    public function paginaConfirmarPedido()
    {

        if (isset($_SESSION["carrinho"]) && !empty($_SESSION["carrinho"])) {

            $this->view(
                [
                    "confirmar-pedido",
                    "footer"
                ]
            );
        } else {
            header("Location: " . URL_BASE);
        }
    }
    public  function confirmarPedido()
    {
        if (isset($_SESSION["carrinho"]) && !empty($_SESSION["carrinho"])) {
            $carinho = $_SESSION["carrinho"];
            $resposta = [];

            foreach ($carinho as $id_produto => $quntidade) {

                if (Produtos::getQuantidade($id_produto) < $quntidade) {
                  
                    $resposta[] = ["nome" => Produtos::getProdutoById($id_produto)["nome"], "qtd" => Produtos::getQuantidade($id_produto)];
                }
            }


            echo json_encode($resposta);
        }
    }


    public function success($data)
    {
        session_destroy();
        $this->view(
            [
                "header",
                "success",
                "footer"
            ]
        );
    }
}
