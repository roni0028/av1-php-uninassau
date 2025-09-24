<section id="clientes" class="section alt">
    <div class="container">
        <div class="section-head">
            <h2>Marcas que confiam</h2>
            <p>Puros ícones flutuantes. Passe o mouse para ver o nome.</p>
        </div>
        <div class="bubbles">
            <?php
            $clientsJson = @file_get_contents(__DIR__ . '/../assets/data/clients.json');
            $clients = $clientsJson ? json_decode($clientsJson, true) : [];
            if (is_array($clients) && count($clients) > 0):
                $idx = 0;
                foreach ($clients as $client):
                    $idx++;
                    $name = htmlspecialchars($client['name'] ?? '');
                    $icon = $client['icon'] ?? '';
                    $gid = 'g' . $idx;
                    $iconSafe = str_replace(['id="g"', 'url(#g)', 'id="gb"', 'url(#gb)'], ['id="' . $gid . '"', 'url(#' . $gid . ')', 'id="gb' . $idx . '"', 'url(#gb' . $idx . ')'], $icon);
                    ?>
            <div class="bubble" data-name="<?= $name ?>">
                <div class="label"><?= $name ?></div>
                <div class="circle">
                    <?= $iconSafe ?>
                </div>
            </div>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>