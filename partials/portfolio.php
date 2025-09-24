<section id="portfolio" class="section">
    <div class="container">
        <div class="section-head">
            <h2>Portfólio</h2>
            <p>Alguns projetos que nos orgulham.</p>
        </div>
        <div class="portfolio">
            <?php
            $portfolioJson = @file_get_contents(__DIR__ . '/../assets/data/portfolio.json');
            $portfolio = $portfolioJson ? json_decode($portfolioJson, true) : [];
            if (is_array($portfolio) && count($portfolio) > 0):
                foreach ($portfolio as $item):
                    $title = htmlspecialchars($item['title'] ?? 'Projeto');
                    $desc = htmlspecialchars($item['description'] ?? '');
                    $img = htmlspecialchars($item['image'] ?? '');
                    $chips = $item['chips'] ?? [];
                    ?>
            <a class="work" href="#" aria-label="<?= $title ?>">
                <div class="work-thumb" style="background-image:url('<?= $img ?>')"></div>
                <div class="work-overlay">
                    <div class="chips">
                        <?php foreach ($chips as $c): ?>
                        <span class="chip"><?= htmlspecialchars($c) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="work-body">
                        <h3><?= $title ?></h3>
                        <p><?= $desc ?></p>
                        <div class="actions"><span class="link">Ver case →</span></div>
                    </div>
                </div>
            </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>