<?php

require_once __DIR__ . '/../config/Database.php';

class Usuario
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stnt = $this->db->query("SELECT id, nome, email, criado_em FROM usuarios ORDER BY id DESC");

        return $stnt->fetchAll();
    }

    public function buscarPorEmail(string $email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stnt = $this->db->prepare($sql);

        $stnt->execute(["email" => $email]);
        return $stnt->fetch();
    }

    public function salvar(string $nome, string $email, string $senha)
    {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stnt = $this->db->prepare($sql);
        $values = [
            "nome"  => $nome,
            "email" => $email,
            "senha" => password_hash($senha, PASSWORD_DEFAULT)
        ];

        return $stnt->execute($values);
    }

    public function atualizar(string $nome, string $email, int $id, ?string $senha = null)
    {
        $values = [
            "nome"  => $nome,
            "email" => $email,
            "id"    => $id
        ];

        if (!empty($senha)) {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $values["senha"] = password_hash($senha, PASSWORD_DEFAULT);
        } else {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
        }

        $stnt = $this->db->prepare($sql);
        return $stnt->execute($values);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT id, nome, email, criado_em FROM usuarios WHERE id = :id";
        $stnt = $this->db->prepare($sql);

        $stnt->execute(["id" => $id]);
        return $stnt->fetch();
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stnt = $this->db->prepare($sql);

        return $stnt->execute(["id" => $id]);
    }
}
