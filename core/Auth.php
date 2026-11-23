<?php

class Auth
{
    const TEMPO_LIMITE = 1800;

    public static function logar(array $usuario): void
    {
        session_regenerate_id(true);

        $_SESSION['usuario_id']    = $usuario['id'];
        $_SESSION['usuario_nome']  = $usuario['nome'];
        $_SESSION['ultimo_acesso'] = time();
    }

    public static function sair(): void
    {
        $_SESSION = [];
        session_destroy();
    }

    public static function estaLogado(): bool
    {
        return isset($_SESSION['usuario_id']);
    }

    public static function exigirLogin(): void
    {
        if (!self::estaLogado()) {
            Flash::set('warning', 'Faça login para acessar o painel.');
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        if (time() - $_SESSION['ultimo_acesso'] > self::TEMPO_LIMITE) {
            self::sair();
            session_start();
            Flash::set('warning', 'Sua sessão expirou. Entre novamente.');
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $_SESSION['ultimo_acesso'] = time();
    }

    public static function usuarioNome(): string
    {
        return $_SESSION['usuario_nome'] ?? '';
    }
}
