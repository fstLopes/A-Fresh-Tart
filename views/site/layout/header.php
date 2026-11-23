<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Fresh Tart | Confeitaria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&family=Libre+Baskerville:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>/views/css/site.css">
</head>

<body>
    <header class="container pt-3">
        <nav class="navbar navbar-expand-md ft-menu mx-auto px-3">
            <a class="navbar-brand d-md-none" href="<?= BASE_URL ?>/">A Fresh Tart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuSite"
                aria-controls="menuSite" aria-expanded="false" aria-label="Abrir menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuSite">
                <ul class="navbar-nav w-100 justify-content-between">
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/#quem-sou">Quem sou</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/#destaques">Destaques</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/#contato">Contato</a></li>
                </ul>
            </div>
        </nav>
    </header>
