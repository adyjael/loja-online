<?php

namespace App\Models;

use PDO;

class Produtos extends Connection
{


    public static function verificar_stock_produto($id_produto)
    {
        $query = self::connect()->prepare("SELECT * from produtos WHERE quantidades > 0 AND id = ?");
        $query->execute(array($id_produto));
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public static function novaCompra($nomeComprador,$dataNascimento,$morada, $id_produto,$quantidade,$precoTotal){

        $query = self::connect()->prepare("INSERT INTO encomendas (nomeComprador,dataNascimanto,morada,id_produto,quantidadeComprada,precoTotal)
                                        VALUES(?,?,?,?,?,?)");
        $query->execute(array($nomeComprador,$dataNascimento,$morada,$id_produto,$quantidade,$precoTotal));


    }

    public static function getProdutoById($id_produto){
        $query = self::connect()->prepare("SELECT * FROM produtos WHERE id = ?");
        $query->execute(array($id_produto));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function buscar_produto_por_ids($ids)
    {
        $query = self::connect()->prepare("SELECT * FROM produtos WHERE id IN ($ids)");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function precoDecrescente()
    {
        $query = self::connect()->prepare("SELECT * from produtos order by preco DESC");
        $query->execute();
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public static function precoCrescente()
    {
        $query = self::connect()->prepare("SELECT * from produtos order by preco ASC");
        $query->execute();
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public static function setQuantidade($id_produto, $quantidade)
    {
        $query = self::connect()->prepare("UPDATE produtos SET quantidades = ? WHERE id = ?");
        $query->execute(array($quantidade, $id_produto));
    }
    public static function getQuantidade($id_produto)
    {
        $query = self::connect()->prepare("SELECT quantidades FROM produtos WHERE id = ?");
        $query->execute(array($id_produto));
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        return (int) $resultado["quantidades"] ?? 0;
    }

    public static function buscar_preco_produto($id_produto)
    {
        $query = self::connect()->prepare("SELECT preco FROM produtos WHERE id = ?");
        $query->execute(array($id_produto));
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        return (float) $resultado["preco"];
    }
}
