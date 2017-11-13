<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <?php echo liveCSS('assets/bundle.css') ?>
</head>

<body
  data-category="<?php echo getTopLevelPage($page)->uid() ?>"
  data-depth="<?php echo min($page->depth() - 1, 2) ?>"
>
