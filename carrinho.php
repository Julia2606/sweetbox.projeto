<?php
session_start();
require_once "src/BolosDAO.php";

// Verifica se o carrinho existe na sessão, caso contrário, inicializa-o
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Obtém o ID do produto a partir da solicitação POST
$id_produto = $_POST['id_produto'] ?? null;

if ($id_produto) {
    // Consulta o produto no banco de dados usando o ID
    $produto = BolosDAO::consultarProdutos($id_produto);

    if ($produto) {
        // Adiciona o produto ao carrinho (ou atualiza a quantidade, caso já exista)
        if (isset($_SESSION['carrinho'][$id_produto])) {
            $_SESSION['carrinho'][$id_produto]['quantidade']++;
        } else {
            foreach ($produto as $produtos) {
                # code...
                $_SESSION['carrinho'][$id_produto] = [
                    'nome' => $produtos['nome'],
                    'valor' => $produtos['valor'],
                    'imagem' => $produtos['imagem'],
                    'quantidade' => 1
                ];
            }
        }
        echo "Produto adicionado ao carrinho!";
    } else {
        echo "Produto não encontrado!";
    }
} else {
    echo "Nenhum produto especificado.";
}

// Redireciona de volta para a página do carrinho ou exibe a mensagem de sucesso
header("Location: visualizar_carrinho.php");
exit;
?>
