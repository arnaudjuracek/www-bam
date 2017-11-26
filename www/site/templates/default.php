<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <article>
    <?php echo $page->text()->kirbytext() ?>
  </article>
  <footer>
    <?php echo $site->footer()->kirbytext() ?>
  </footer>
</main>

<?php snippet('footer') ?>
