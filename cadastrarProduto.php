<?php
require_once "src/conexaoBD.php";
require_once "src/funcoes.php";

$nome = $_POST['nomeProduto'];
$valor = $_POST['valorProduto'];
$categoria = $_POST['categoriaProduto'];
$img = pegarImagem($_FILES);
$descricao = $_POST['descricaoProduto'];
$sql = "insert into produtos (nome, valor, categoria, descricao, imagem) values ('$nome', '$valor', '$categoria', '$descricao', '$img')";
$conexao = conexaoBD::conectar();
$conexao->exec($sql);
echo "Deu";

/* SELECT * FROM sweetbox.produto;
use sweetbox;
create table produtos (
id_produto int auto_increment primary key not null,
nome varchar(255) not null,
valor int not null,
categoria varchar(255) not null,
imagem varchar(255) not null
);

select * from produtos;
delete from produtos where id_produto = 1;
*/