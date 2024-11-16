<?php
require_once "conexaoBD.php";

class BolosDAO {
    public static function consultarProdutos($idproduto) {
        $conexao = ConexaoBD::conectar();
        $sql = "select * from produtos where id_produto = $idproduto";
        return $conexao->query($sql); 
    }

    public static function consultarProdutosCategoria($idcategoria) {
        $conexao = ConexaoBD::conectar();
        $sql = "select * from produtos where categoria = $idcategoria";
        return $conexao->query($sql); 
    }

    public static function consultarCategoria() {
        $conexao = ConexaoBD::conectar();
        $sql = "select * from categoria";
        return $conexao->query($sql); 
    }

    public static function consultarCategoriaIndividual($idcategoria) {
        $conexao = ConexaoBD::conectar();
        $sql = "select * from categoria where id_categoria = $idcategoria";
        return $conexao->query($sql); 
    }
}