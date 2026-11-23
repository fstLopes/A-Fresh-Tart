<?php

class UsuarioController
{

    private $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function index()
    {
        $usuarios = $this->model->listar();
        require_once __DIR__ . '/../views/usuarios/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = $_POST['senha'] ?? '';

            if (!$nome || !$email) {
                Flash::set('danger', 'Preencha nome e um e-mail válido.');
            } elseif (strlen($senha) < 6) {
                Flash::set('danger', 'A senha precisa ter pelo menos 6 caracteres.');
            } elseif ($this->model->buscarPorEmail($email)) {
                Flash::set('danger', 'Já existe um usuário com esse e-mail.');
            } else {
                $this->model->salvar($nome, $email, $senha);

                Flash::set('success', 'Usuário cadastrado com sucesso.');
                header('Location: ' . BASE_URL . '/usuarios');
                exit;
            }
        }

        require_once __DIR__ . '/../views/usuarios/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: ' . BASE_URL . '/usuarios');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = $_POST['senha'] ?? '';
            $outro = $email ? $this->model->buscarPorEmail($email) : false;

            if (!$nome || !$email) {
                Flash::set('danger', 'Preencha nome e um e-mail válido.');
            } elseif ($senha !== '' && strlen($senha) < 6) {
                Flash::set('danger', 'A nova senha precisa ter pelo menos 6 caracteres.');
            } elseif ($outro && $outro['id'] != $id) {
                Flash::set('danger', 'Esse e-mail já é de outro usuário.');
            } else {
                $this->model->atualizar($nome, $email, $id, $senha);

                Flash::set('success', 'Usuário atualizado com sucesso.');
                header('Location: ' . BASE_URL . '/usuarios');
                exit;
            }
        }

        $usuario = $this->model->buscarPorId($id);

        if (!$usuario) {
            header('Location: ' . BASE_URL . '/usuarios');
            exit;
        }

        require_once __DIR__ . '/../views/usuarios/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id && $id == $_SESSION['usuario_id']) {
            Flash::set('warning', 'Você não pode excluir o seu próprio usuário.');
        } elseif ($id) {
            $this->model->excluir($id);
            Flash::set('success', 'Usuário excluído.');
        }

        header('Location: ' . BASE_URL . '/usuarios');
        exit;
    }
}
