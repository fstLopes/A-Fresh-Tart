<?php

class SiteController
{
    public function index()
    {
        $produtoModel = new Produto();
        $destaques = $produtoModel->destaques(6);

        require __DIR__ . '/../views/site/home.php';
    }
}
