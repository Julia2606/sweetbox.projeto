<?php
include "incs/topo.php";
require_once "src/BolosDAO.php";
?>

<main>
    <header>
    </header>

    <form action="categoria.php" method="post" enctype="multipart/form-data">
        <label for="">Nome da categoria</label>
        <input type="text" name="nomeCategoria" id="">

        <label for="">Descrição</label>
        <input type="text" name="descricaoCategoria" id="">

        <label for="">img</label>
        <input type="file" src="" alt="" name="imagem">

        <input type="submit" value="Cadastrar categoria">

    </form>

</main>
<?php
include "incs/rodape.php";
?>