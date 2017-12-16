<!DOCTYPE html>
<html lang="fr">
<head>
  <?php snippet('header.metas') ?>
  <?php echo liveCSS('assets/bundle.css') ?>
</head>
<body
  data-category="<?php echo getTopLevelPage($page)->uid() ?>"
  data-depth="<?php echo min($page->depth() - 1, 2) ?>"
>
