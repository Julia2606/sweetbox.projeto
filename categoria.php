<?php
require_once "src/conexaoBD.php";
require_once "src/funcoes.php";

$nome = $_POST['nomeCategoria'];
$descricao = $_POST['descricaoCategoria'];
$img = pegarImagem($_FILES);
$sql = "insert into categoria (categoria, descricao, img_categoria) values ('$nome', '$descricao', '$img')";
$conexao = conexaoBD::conectar();
$conexao->exec($sql);
echo "Deu";