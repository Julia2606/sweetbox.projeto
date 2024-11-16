<?php
include "incs/topo.php";
require_once "src/BolosDAO.php";
$categorias = BolosDAO::consultarCategoria();
?>

<main>
    <div class="container cardapio">
        <?php
        foreach ($categorias as $categoria) {
            ?>
                <div class="col-3">
                    <form action="produtos.php" method="post">
                        <button type="submit" style="border: none; background: none;">
                            <img src="data:image/jpg;base64,<?= base64_encode($categoria['img_categoria']) ?>" alt="Brownie"
                            id="img1">
                            <input type="hidden" name="id_categoria" value="<?= $categoria['id_categoria'] ?>">
                        </button>
                    </form>
                </div>
            <?php
        }
        ?>
    </div>

</main>
<?php
include "incs/rodape.php";
?>