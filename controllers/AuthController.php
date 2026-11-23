<?php

class AuthController
{
    public function login()
    {
        if (Auth::estaLogado()) {
            header('Location: ' . BASE_URL . '/painel');
            exit;
        }

        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
            $senha = $_POST['senha'] ?? '';

            $model = new Usuario();
            $usuario = $model->buscarPorEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                Auth::logar($usuario);
                Flash::set('success', 'Bem-vindo(a), ' . $usuario['nome'] . '!');
                header('Location: ' . BASE_URL . '/painel');
                exit;
            }

            Flash::set('danger', 'E-mail ou senha inválidos.');
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout()
    {
        Auth::sair();
        session_start();
        Flash::set('info', 'Você saiu do painel.');
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}
