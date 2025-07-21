<?php
require 'conexao.php'; 


require_once 'livro.php';

$Livro = new livro($pdo);

$Livro->setNome($_POST['nome']);
$Livro->setTipo($_POST['tipo']);
$Livro->setAutor($_POST['autor']);
$Livro->setEditora($_POST['editora']);

if ($Livro->salvar()) {
    echo "Livro cadastrado com sucesso! <a href='listar_livro.php'>Ver lista</a>";
} else {
    echo "Erro ao cadastrar Livro.";
}
?>