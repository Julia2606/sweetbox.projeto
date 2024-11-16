<?php
session_start(); // Inicia a sessão

include "incs/topo.php";
$valorTotal = 0;
?>
<style>
    /* CSS fornecido */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        font-size: 62.5%;
    }

    body {
        font-family: Poppins, monospace;
        font-size: 1.6rem;
    }

    .container {
        width: 1140px;
        max-width: 100%;
        margin: 0 auto;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #ffb7c1;
        font-weight: bold;
    }

    img {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    /* Botão de envio */
    .btn {
        background-color: #ffb7c1;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        margin-top: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: palevioletred;
    }
</style>
<div class="container">
    <h1 class="center">Carrinho de compras</h1>

    <?php if (!empty($_SESSION['carrinho'])): ?>
        <table>
            <tr>
                <th>Foto do Produto</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Valor final</th>
            </tr>

            <?php foreach ($_SESSION['carrinho'] as $produto): ?>
                <tr>
                    <td><img src="data:image/jpg;base64,<?= base64_encode($produto['imagem']) ?>" alt="Imagem do Produto"></td>
                    <td><?= $produto['nome'] ?></td>
                    <td>R$ <?= number_format($produto['valor'], 2, ',', '.') ?></td>
                    <td>
                        <select name="quantidade" id="quantidade">
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                                <option value="<?= $i ?>" <?= $produto['quantidade'] == $i ? 'selected' : '' ?>>
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                    <td>
                        <?php
                        $valorFinal = $produto['valor'] * $produto['quantidade'];
                        ?>
                        <?= $valorFinal ?>
                    </td>
                </tr>


                <?php $valorTotal += $valorFinal;
            endforeach;
            ?>

        </table>

        <p>Valor total: <?= $valorTotal ?></p>
        <select name="" id="">
            <option value="">Selecione a forma de pagamento</option>
            <option value="">PIX</option>
            <option value="">Cartão</option>
            <option value="">Dinheiro</option>
        </select>
        <a href="final.php">
            <button class="btn">Finalizar</button>
        </a>

    <?php else: ?>
        <p>O carrinho está vazio.</p>
    <?php endif; ?>
</div>

<?php include "incs/rodape.php"; ?>