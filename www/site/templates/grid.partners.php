<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <ul class="grid-items">
    <?php foreach ($page->children()->visible() as $item): ?>
      <?php snippet('preview.partner', ['page' => $item]) ?>
    <?php endforeach ?>
  </ul>
  <aside class="outside"></aside>
  <footer>
    <?php echo $page->footer()->kirbytext() ?>
  </footer>
</main>

<?php snippet('footer') ?>
