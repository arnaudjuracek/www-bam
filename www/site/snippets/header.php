<!DOCTYPE html>
<html lang="fr">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-42831572-1"></script>
  <script>
    window.dataLayer = window.dataLayer || []
    function gtag () { dataLayer.push(arguments); }
    gtag('js', new Date())
    gtag('config', 'UA-42831572-1')
  </script>
  <?php snippet('header.metas') ?>
  <?php echo liveCSS('assets/bundle.css') ?>
</head>
<body
  data-category="<?php echo getTopLevelPage($page)->uid() ?>"
  data-depth="<?php echo min($page->depth() - 1, 2) ?>"
>
