<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema MVC PHP OO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/fresh_tart/views/css/style.css">
</head>

<body>
    <header class="main-header">
        <div class="container">
            <h2>Sistema MVC</h2>
            <nav>
                <span>Olá, <?= htmlspecialchars(Auth::usuarioNome()) ?></span>
                <a href="<?= BASE_URL ?>/logout">Sair</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <?php include __DIR__ . '/flash.php'; ?>
