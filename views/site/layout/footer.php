    <footer id="contato" class="ft-rodape pt-5 pb-3">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="ft-titulo">A Fresh Tart</h5>
                    <p class="mb-0">Confeitaria artesanal feita com carinho, todos os dias.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="ft-titulo">Navegação</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="<?= BASE_URL ?>/">Início</a></li>
                        <li><a href="<?= BASE_URL ?>/#quem-sou">Quem sou</a></li>
                        <li><a href="<?= BASE_URL ?>/#destaques">Destaques</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="ft-titulo">Contato</h5>
                    <p class="mb-0">contato@freshtart.com</p>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center border-top mt-4 pt-3 small">
                <span>&copy; <?= date('Y') ?> A Fresh Tart</span>
                <a href="<?= BASE_URL ?>/login" class="ft-link-admin">Área restrita</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
