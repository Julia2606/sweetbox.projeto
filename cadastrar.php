<?php
include "incs/topo.php";
require_once "src/BolosDAO.php";
$categorias = BolosDAO::consultarCategoria();
?>

<main>
    <header>

    <form action="cadastrarProduto.php" method="post" enctype="multipart/form-data">
        <label for="">Nome do produto</label>
        <input type="text" name="nomeProduto" id="">

        <label for="">Valor</label>
        <input type="text" name="valorProduto" id="">

        <label for="">Categoria</label>
        <select name="categoriaProduto" id="">
            <option value="">Selecione a opção</option>
            <?php
            foreach ($categorias as $categoria) {
                ?>
                <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['categoria'] ?></option>
                <?php
            }
            ?>
        </select>
        
        <label for="">Descrição do Produto</label>
        <input type="text" name="descricaoProduto" id="">

        <label for="">img</label>
        <input type="file" src="" alt="" name="imagem">

        <input type="submit" value="Cadastrar Produto">
    </form>

</main>
<?php
include "incs/rodape.php";
?>