<section id="historia" class="section">
    <div class="container">
        <div class="section-head">
            <h2>Nossa história</h2>
            <p>De um sonho de três fundadores a uma software house guiada por resultados.</p>
        </div>
        <div class="timeline">
            <?php
            $timelineJson = @file_get_contents(__DIR__ . '/../assets/data/timeline.json');
            $timeline = $timelineJson ? json_decode($timelineJson, true) : [];
            if (is_array($timeline) && count($timeline) > 0):
              foreach ($timeline as $evt):
                $side = ($evt['side'] ?? 'left') === 'right' ? 'right' : 'left';
                $badge = htmlspecialchars($evt['badge'] ?? '');
                $title = htmlspecialchars($evt['title'] ?? '');
                $subtitle = htmlspecialchars($evt['subtitle'] ?? '');
                $text = htmlspecialchars($evt['text'] ?? '');
                $tags = isset($evt['tags']) && is_array($evt['tags']) ? $evt['tags'] : [];
                ?>
            <div class="tl-item <?= $side ?>">
                <div class="tl-badge"><?= $badge ?></div>
                <div class="tl-body">
                    <h4><?= $title ?></h4>
                    <?php if ($subtitle): ?><p><small><?= $subtitle ?></small></p><?php endif; ?>
                    <p><?= $text ?></p>
                    <?php if (count($tags) > 0): ?>
                    <div class="chips">
                        <?php foreach ($tags as $tg): ?>
                        <span class="chip"><?= htmlspecialchars($tg) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>