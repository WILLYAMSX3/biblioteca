<?php
require 'conexao.php';
require 'livro.php';
session_start();

$Livro = new livro($pdo);
$livroCarrinho = [];
if (isset($_SESSION['carrinho']) && (!empty($_SESSION['carrinho']))) {
    foreach ($_SESSION['carrinho'] as $id) {
        $livroCarrinho[] = $Livro->buscaporid($id);
    }
}
if (isset($_GET['remover'])) {
    $idRemover = $_GET['remover'];
}
if (($key = array_search($idRemover, $SESSION['carrinho'])) !== false) {
    unset($_SESSION['carrinho'][$key]);
}
header('location: carrinho.php');
