
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'RMS', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="/style/RMS-Mockup.css">
</head>
<body>

    <?php require __DIR__ . '/RMS-Mockup-HEADER.HTML'; ?>

    <main>
        <?= $output ?>
    </main>

    <?php require __DIR__ . '/RMS-Mockup-FOOTER.html'; ?>

    <script src="/style/RMS-Mockup.js"></script>

</body>
</html>
