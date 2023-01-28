<?php


namespace App\Models;

use PDO;

class Admin extends Connection
{

    public static function inserirNovoProduto($nome, $descricao, $imagem, $quantidade, $preco)
    {

        $query = self::connect()->prepare("INSERT INTO produtos (nome,descricao,imagem,quantidades,preco) VALUES(?,?,?,?,?)");
        $query->execute(array($nome, $descricao, $imagem, $quantidade, $preco));
    }
    public static function selecionarTodosProdutos()
    {
        $query = self::connect()->prepare("SELECT * from produtos ORDER BY id DESC");
        $query->execute();
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultados ? $resultados : false;
    }


    public static function login($nome, $senha)
    {

        $query = self::connect()->prepare("SELECT nome,senha FROM utilizadores WHERE nome = ? AND senha = ?");
        $query->execute(array($nome, $senha));
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $_SESSION["dono-loja"] = $resultado;
            return true;
        } else {
            return false;
        }
    }


    public static function atualizarProduto($id_produto, $nome, $preco, $quantidade)
    {

        $query = self::connect()->prepare("UPDATE produtos SET nome = ?,preco = ?, quantidades = ? WHERE id = ?");
        $query->execute(array($nome, $preco, $quantidade, $id_produto));
    }
    public static function selecionarEncomendas()
    {

        $query = self::connect()->prepare("SELECT e.nomeComprador,e.dataNascimanto,e.morada,e.quantidadeComprada,e.precoTotal,e.data, p.nome as 'produto'  FROM encomendas e JOIN produtos p ON e.id_produto = p.id order by e.id desc");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function eliminarProduto($id_produto)
    {
        $query = self::connect()->prepare("DELETE FROM produtos WHERE id = ?");
        $query->execute(array($id_produto));
    }
}
