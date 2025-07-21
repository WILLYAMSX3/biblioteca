<?php
require 'conexao.php';
require_once 'livro.php';

if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("ID do livro não informado.");
}

$Livro = new Livro($pdo);

$Livro->setId($_POST['id']);
$Livro->setNome($_POST['nome']);
$Livro->setTipo($_POST['tipo']);
$Livro->setAutor($_POST['autor']);
$Livro->setEditora($_POST['editora']);

if ($Livro->atualizar()) {
    echo "Livro atualizado com sucesso! <a href='listar_livro.php'>Ver lista</a>";
} else {
    echo "Erro ao atualizar Livro.";
}
