<?php
require 'conexao.php';
require 'livro.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID não informado.");
}

$sql = "SELECT * FROM livros WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livro) {
    die("Livro não encontrado.");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">
    <h2>Editar Livro</h2>
    <form action="atualizar_livro.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($livro['id']) ?>">

        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($livro['nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Autor:</label>
            <input type="text" name="autor" class="form-control" value="<?= htmlspecialchars($livro['autor']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Tipo:</label>
            <input type="text" name="tipo" class="form-control" value="<?= htmlspecialchars($livro['tipo']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Editora:</label>
            <input type="text" name="editora" class="form-control" value="<?= htmlspecialchars($livro['editora']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>

</body>

</html>