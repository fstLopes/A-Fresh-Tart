<?php

class ProdutoController
{

    private $model;

    public function __construct()
    {
        $this->model = new Produto();
    }

    public function index()
    {

        $produtos = $this->model->listar();
        require_once __DIR__ . '/../views/produtos/index.php';
    }

    public function adicionar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($produto && $valor && $descricao) {

                $this->model->salvar($produto, $valor, $descricao);

                Flash::set('success', 'Produto cadastrado com sucesso.');

                header('Location: /fresh_tart/produtos');
                exit;
            }
        }

        require_once __DIR__ . '/../views/produtos/criar.php';
    }

    public function editar()
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {

            header('Location: /fresh_tart/produtos');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($produto && $valor && $descricao) {

                $this->model->atualizar($produto, $valor, $descricao, $id);

                Flash::set('success', 'Produto atualizado com sucesso.');

                header('Location: /fresh_tart/produtos');
                exit;
            }
        }

        $produtos = $this->model->buscarPorId($id);

        if (!$produtos) {
            header('Location: /fresh_tart/produtos');
            exit;
        }

        require_once __DIR__ . '/../views/produtos/editar.php';
    }

    public function excluir()
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {

            $this->model->excluir($id);
            Flash::set('success', 'Produto excluído.');
        }

        header('Location: /fresh_tart/produtos');
        exit;
    }
}
