<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <article>
    <?php echo $page->text()->kirbytext() ?>
  </article>
</main>

<?php snippet('footer') ?>
