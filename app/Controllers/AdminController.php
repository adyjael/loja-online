<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Produtos;

class AdminController extends Web {


    public function index (){

        if(!isset($_SESSION["dono-loja"])){
            $this->view([
                "login"
            ]);
        }else{

            $produtos = Admin::selecionarTodosProdutos();
    
            $this->view([
                "header_admin",
                "admin"
            ],[
                "produtos" => $produtos
            ]);
        }


    }

    public function encomendas(){

    if(isset($_SESSION["dono-loja"])){

        //dd(Admin::selecionarEncomendas());
        $this->view(
            [
                "header_admin",
                "encomendas"
            ],
            [
                "encomendas" => Admin::selecionarEncomendas(),
            ]);

    }else{
     header("Location: ". URL_BASE. "/admin");
    }


    }

    public function login($data){

        if(Admin::login($data["nome"],$data["senha"])){
            header("Location: " .URL_BASE. "/admin");
        }else{
            $_SESSION["erro"] = "Nome ou senha invalido";
            header("Location: " .URL_BASE. "/admin");

        }

    }


    public function novoProduto($data){
        // dd($data);
        $nome = $data["nome-produto"];
        $descricao = $data["descricao-produto"];
        $quantidade = $data["quantidade-produto"];
        $preco = str_replace(",",".",$data["preco-produto"]);
        $imagem = $_FILES['imagem-produto'];

        $uploads_dir =  'assets/imagemProdutos/';
        $nome_imagem = $imagem['name'];
        $novo_nome_imagem = uniqid();
        $extensao = strtolower(pathinfo($nome_imagem, PATHINFO_EXTENSION));
        $path = $uploads_dir . $novo_nome_imagem . "." . $extensao;
        move_uploaded_file($imagem["tmp_name"], $path);


        Admin::inserirNovoProduto($nome,$descricao,$path,$quantidade,$preco);


        header("Location: ". URL_BASE. "/admin");

    }

    public function editarProduto($data){
      echo json_encode(Produtos::getProdutoById($data["id"]));
    }

    public function eliminarProduto($data){

        Admin::eliminarProduto($data["id"]);

    }


    public function atualizarProduto($data){

        //dd($data);
        Admin::atualizarProduto($data["id-produto"],$data["nome-produto"],$data["preco-produto"],$data["quantidade-produto"]);
        header("Location: ". URL_BASE. "/admin");
    }

}