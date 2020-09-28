<!doctype html>
<html lang="en">
    <head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171145480-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-171145480-1', { 'anonymize_ip': true });
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>OpenTexts.world: <?= esc($title); ?></title>
        <meta name="description" content="Search, discover, and download digitised texts and books.">

        <!-- OG Tags -->
        <meta property="og:title" content="<?= esc($title); ?>" />
        <meta property="og:url" content="<?php echo current_url(true); ?>" />
        <meta property="og:image" content="https://opentexts.world/public/og-image.png" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="A search engine for books. OpenTexts provides free access to digitised text collections from around the world." />
        <meta property="og:locale" content="en_GB" />

        <link rel="icon" type="image/png" href="/favicon.png"  />
        <link rel="stylesheet" href="/css/app.css">
        <?php if (getenv('CI_ENVIRONMENT') !== 'production'): ?>
          <script src="//localhost:35729/livereload.js"></script>
        <?php endif; ?>
</head>

<body class=" mx-auto bg-blue-900">
