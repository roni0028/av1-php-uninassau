        <section id="depoimentos" class="section alt">
            <div class="container">
                <div class="section-head">
                    <h2>O que dizem</h2>
                    <p>Feedbacks de quem já construiu com a gente.</p>
                </div>
                <div class="t-controls"><button class="t-prev" aria-label="Anterior">‹</button><button class="t-next" aria-label="Próximo">›</button></div>
                <div class="testimonials" id="testimonials">
                    <?php
                    $tjson = @file_get_contents(__DIR__ . '/../assets/data/testimonials.json');
                    $tlist = $tjson ? json_decode($tjson, true) : [];
                    if (is_array($tlist) && count($tlist) > 0):
                      foreach ($tlist as $t):
                        $name = htmlspecialchars($t['name'] ?? '');
                        $role = htmlspecialchars($t['role'] ?? '');
                        $avatar = htmlspecialchars($t['avatar'] ?? '');
                        $stars = intval($t['stars'] ?? 5);
                        if ($stars < 0) $stars = 0;
                        if ($stars > 5) $stars = 5;
                        $text = htmlspecialchars($t['text'] ?? '');
                        $starsTxt = str_repeat('★', $stars) . str_repeat('☆', 5 - $stars);
                        ?>
                    <div class="testimonial">
                        <div class="t-head">
                            <img class="avatar" src="<?= $avatar ?>" alt="Avatar">
                            <div class="meta">
                                <div class="name"><?= $name ?></div>
                                <div class="role"><?= $role ?></div>
                                <div class="stars" aria-label="<?= $stars ?> de 5"><?= $starsTxt ?></div>
                            </div>
                        </div>
                        <p>“<?= $text ?>”</p>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

