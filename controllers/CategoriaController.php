<?php

class CategoriaController
{

    private $model;

    public function __construct()
    {
        $this->model = new Categoria();
    }

    public function index()
    {

        $categorias = $this->model->listar();
        require_once __DIR__ . '/../views/categorias/index.php';
    }

    public function adicionar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($categoria && $descricao) {

                $this->model->salvar($categoria, $descricao);

                Flash::set('success', 'Categoria cadastrada com sucesso.');

                header('Location: /fresh_tart/categorias');
                exit;
            }
        }

        require_once __DIR__ . '/../views/categorias/criar.php';
    }

    public function editar()
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {

            header('Location: /fresh_tart/categorias');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($categoria && $descricao) {

                $this->model->atualizar($categoria, $descricao, $id);

                Flash::set('success', 'Categoria atualizada com sucesso.');

                header('Location: /fresh_tart/categorias');
                exit;
            }
        }

        $categorias = $this->model->buscarPorId($id);

        if (!$categorias) {
            header('Location: /fresh_tart/categorias');
            exit;
        }

        require_once __DIR__ . '/../views/categorias/editar.php';
    }

    public function excluir()
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {

            $this->model->excluir($id);
            Flash::set('success', 'Categoria excluída.');
        }

        header('Location: /fresh_tart/categorias');
        exit;
    }
}
