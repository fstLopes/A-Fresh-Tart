<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | A Fresh Tart Bakery</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&family=Libre+Baskerville:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>/views/css/login.css">
</head>

<body>
    <main class="container min-vh-100 d-flex align-items-center py-5">
        <div class="row w-100 align-items-center g-5 mx-0">

            <div class="col-lg-6">
                <h1 class="ft-titulo display-5 mb-5" style="max-width: 420px;">Bem vindo à página de login!</h1>
                <p class="ft-texto fs-5 mb-4">Crie uma conta e aproveite ainda mais nossas sobremesas incríveis!</p>

                <button type="button" class="btn btn-ft btn-lg px-4" data-bs-toggle="modal" data-bs-target="#modalConta">
                    Não tenho uma conta
                </button>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="ft-card p-4 p-md-5">

                    <div class="text-center">
                        <img src="<?= BASE_URL ?>/views/img/logo.png" alt="A Fresh Tart Bakery" class="ft-logo">
                    </div>

                    <hr class="ft-linha my-4">

                    <?php include __DIR__ . '/../layout/flash.php'; ?>

                    <form action="<?= BASE_URL ?>/login" method="POST">
                        <div class="mb-3">
                            <label for="email" class="visually-hidden">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                placeholder="Email" required autofocus
                                value="<?= htmlspecialchars($email) ?>">
                        </div>

                        <div class="mb-4">
                            <label for="senha" class="visually-hidden">Senha</label>
                            <input type="password" id="senha" name="senha" class="form-control form-control-lg"
                                placeholder="Senha" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-ft btn-lg px-5">Entrar</button>
                        </div>
                    </form>

                    <div class="ft-ou my-4">ou</div>

                    <button type="button" class="btn bg-white border w-100 btn-lg fw-semibold" title="Em breve">
                        Entrar com
                        <svg width="20" height="20" viewBox="0 0 48 48" class="ms-1 align-text-bottom" aria-hidden="true">
                            <path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3C33.7 32.7 29.2 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34 6.1 29.3 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.4-.4-3.5z"/>
                            <path fill="#FF3D00" d="M6.3 14.7l6.6 4.8C14.7 15.1 19 12 24 12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34 6.1 29.3 4 24 4 16.3 4 9.7 8.3 6.3 14.7z"/>
                            <path fill="#4CAF50" d="M24 44c5.2 0 9.9-2 13.4-5.2l-6.2-5.2C29.2 35.1 26.7 36 24 36c-5.2 0-9.6-3.3-11.3-8l-6.5 5C9.5 39.6 16.2 44 24 44z"/>
                            <path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3c-.8 2.2-2.2 4.2-4.1 5.6l6.2 5.2C37 39.2 44 34 44 24c0-1.3-.1-2.4-.4-3.5z"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </main>

    <div class="modal fade" id="modalConta" tabindex="-1" aria-labelledby="modalContaTitulo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalContaTitulo">Quer uma conta?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    As contas do painel são criadas pela administração da Fresh Tart.
                    Fale com um administrador para receber seu acesso.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ft" data-bs-dismiss="modal">Entendi</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
