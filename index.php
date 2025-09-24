<?php
$title = 'DEVRAD — Software House';
date_default_timezone_set('America/Sao_Paulo');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main>
        <?php include __DIR__ . '/partials/hero.php'; ?>
        <?php include __DIR__ . '/partials/services.php'; ?>
        <?php include __DIR__ . '/partials/metrics.php'; ?>
        <?php include __DIR__ . '/partials/portfolio.php'; ?>
        <?php include __DIR__ . '/partials/clients.php'; ?>
        <?php include __DIR__ . '/partials/timeline.php'; ?>
        <?php include __DIR__ . '/partials/testimonials.php'; ?>
        <?php include __DIR__ . '/partials/cta.php'; ?>
        <?php include __DIR__ . '/partials/about.php'; ?>
        <?php include __DIR__ . '/partials/contact.php'; ?>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <div class="toast-container" id="toasts" aria-live="polite" aria-atomic="true"></div>
    <script src="assets/js/app.js"></script>
</body>

</html>