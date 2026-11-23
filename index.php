<?php

session_start();

define('BASE_URL', '/fresh_tart');

spl_autoload_register(function ($class_name) {
    foreach (['controllers', 'models', 'core'] as $pasta) {
        $arquivo = __DIR__ . '/' . $pasta . '/' . $class_name . '.php';
        if (file_exists($arquivo)) {
            require_once $arquivo;
            return;
        }
    }
});

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = BASE_URL;
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
if (empty($uri)) {
    $uri = '/';
}

$rotas = [
    '/login'          => ['controller' => 'AuthController',    'metodo' => 'login'],
    '/logout'         => ['controller' => 'AuthController',    'metodo' => 'logout'],

    '/'               => ['controller' => 'SiteController',    'metodo' => 'index'],

    '/painel'         => ['controller' => 'HomeController',    'metodo' => 'index'],
    '/empresa'         => ['controller' => 'HomeController',    'metodo' => 'sobre'],
    '/usuarios'         => ['controller' => 'UsuarioController',    'metodo' => 'index'],
    '/usuarios/adicionar'         => ['controller' => 'UsuarioController',    'metodo' => 'adicionar'],
    '/usuarios/editar'         => ['controller' => 'UsuarioController',    'metodo' => 'editar'],
    '/usuarios/excluir'         => ['controller' => 'UsuarioController',    'metodo' => 'excluir'],
    '/categorias'         => ['controller' => 'CategoriaController',    'metodo' => 'index'],
    '/categorias/adicionar'         => ['controller' => 'CategoriaController',    'metodo' => 'adicionar'],
    '/categorias/editar'         => ['controller' => 'CategoriaController',    'metodo' => 'editar'],
    '/categorias/excluir'         => ['controller' => 'CategoriaController',    'metodo' => 'excluir'],
    '/produtos'         => ['controller' => 'ProdutoController',    'metodo' => 'index'],
    '/produtos/adicionar'         => ['controller' => 'ProdutoController',    'metodo' => 'adicionar'],
    '/produtos/editar'         => ['controller' => 'ProdutoController',    'metodo' => 'editar'],
    '/produtos/excluir'         => ['controller' => 'ProdutoController',    'metodo' => 'excluir']

];

$rotasPublicas = ['/', '/login'];

if (array_key_exists($uri, $rotas)) {
    if (!in_array($uri, $rotasPublicas)) {
        Auth::exigirLogin();
    }

    $controllerName = $rotas[$uri]['controller'];
    $metodo = $rotas[$uri]['metodo'];

    $controller = new $controllerName();
    $controller->$metodo();
} else {
    http_response_code(404);
    require __DIR__ . '/views/404.php';
}
