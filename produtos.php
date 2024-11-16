<?php
include "incs/topo.php";
require_once "src/BolosDAO.php";

$id_categoria = $_POST['id_categoria'] ?? null;

if ($id_categoria) {
    $produtos = BolosDAO::consultarProdutosCategoria($id_categoria);
    $categorias = BolosDAO::consultarCategoriaIndividual($id_categoria);
    foreach ($categorias as $categoria) {
        $nomeCat = $categoria['categoria'];
        $img = $categoria['img_categoria'];
        $descCat = $categoria['descricao'];
    }
} else {
    echo "Categoria não encontrada.";
    exit;
}

?>

<div class="container clearfix">
    <div class="col-6">
        <a href="">
            <img src="data:image/jpg;base64,<?= base64_encode($img) ?>" alt="Brownie">
        </a>
    </div>

    <div>
        <h1><?= $nomeCat ?></h1>
        <p><?= $descCat ?></p>

        <div class="container produtos">
            <?php foreach ($produtos as $produto): ?>
                <div class="produto">
                    <img src="data:image/jpg;base64,<?= base64_encode($produto['imagem']) ?>" class="imgtamanho">
                    <p><?= $produto['nome'] ?></p>
                    <p>R$ <?= number_format($produto['valor'], 2, ',', '.') ?></p>
                    <p><?= $produto['descricao'] ?></p>

                    <!-- Formulário para adicionar ao carrinho -->
                    <form action="carrinho.php" method="post">
                        <input type="hidden" name="id_produto" value="<?= $produto['id_produto'] ?>">
                        <input type="submit" class="btn" value="Adicionar ao carrinho">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include "incs/rodape.php"; ?>