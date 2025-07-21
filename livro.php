<?php
class livro
{
    private $id;
    private $nome;
    private $tipo;
    private $autor;
    private $editora;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function setEditora($editora)
    {
        $this->editora = $editora;
    }

    public function salvar()
    {
        $sql = "INSERT INTO livros (nome, tipo, autor, editora) VALUES (:nome, :tipo, :autor, :editora)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':editora', $this->editora);
        return $stmt->execute();
    }

    public function atualizar()
    {
        $sql = "UPDATE livros SET nome = :nome, tipo = :tipo, autor = :autor, editora = :editora WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':editora', $this->editora);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}
