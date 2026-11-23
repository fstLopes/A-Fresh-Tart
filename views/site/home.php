<?php include __DIR__ . '/layout/header.php'; ?>

<main>
    <section class="ft-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 py-4">
                    <h1 class="ft-titulo ft-hero-titulo">A Fresh Tart</h1>
                    <p class="ft-subtitulo ft-hero-sub mb-0">Confeitaria</p>
                </div>
                <div class="col-md-7 text-end">
                    <img src="<?= BASE_URL ?>/views/img/bolo.png" alt="Torta de chocolate" class="img-fluid ft-hero-bolo">
                </div>
            </div>
        </div>
    </section>

    <div class="ft-onda" aria-hidden="true"></div>

    <section id="quem-sou" class="ft-azul py-4">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-4 text-center">
                    <img src="<?= BASE_URL ?>/views/img/quem-sou.png" alt="A confeiteira da Fresh Tart" class="img-fluid ft-foto">
                </div>
                <div class="col-md-8">
                    <h2 class="ft-titulo ft-secao-titulo">Quem sou?</h2>
                    <p class="ft-texto">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mattis orci felis, non convallis
                        massa pretium sit amet. Nullam semper arcu eget ante vestibulum, sed iaculis massa sodales.
                        Phasellus porta nec. Etiam vitae rutrum ligula, nam condimentum mattis cursus. Integer at risus
                        feugiat, tincidunt magna nec, porta sapien. Nam bibendum ultricies mauris, in hendrerit magna
                        rutrum quis.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="ft-onda" aria-hidden="true"></div>

    <section id="destaques" class="ft-padrao py-4">
        <div class="container">
            <h2 class="ft-titulo ft-secao-titulo mb-4">A Fresh Tart</h2>

            <?php if (!empty($destaques)): ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                    <?php foreach ($destaques as $produto): ?>
                        <div class="col">
                            <div class="card h-100 ft-card-produto">
                                <div class="card-body">
                                    <h5 class="card-title ft-titulo"><?= htmlspecialchars($produto['produto']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($produto['descricao']) ?></p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pb-3">
                                    <span class="ft-preco">R$ <?= number_format($produto['valor'], 2, ',', '.') ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-muted">Em breve, nossas delícias aparecerão aqui.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/layout/footer.php'; ?>
