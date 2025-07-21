<?php
require 'conexao.php';

$sql = "SELECT * FROM livros";
$stmt = $pdo->query($sql);
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">
    <h2>Livros cadastrados</h2>
    <a href="index.php" class="btn btn-success mb-3">Novo Livro</a>
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Autor</th>
            <th>Editora</th>
        </tr>
        <?php foreach ($livros as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l['nome']); ?></td>
                <td><?= htmlspecialchars($l['tipo']); ?></td>
                <td><?= htmlspecialchars($l['autor']); ?></td>
                <td><?= htmlspecialchars($l['editora']); ?></td>
                <td>
                    <a href="editar_livro.php?id=<?= $l['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="excluir_livro.php?id=<?= $l['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Tem certeza que deseja excluir?');">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>