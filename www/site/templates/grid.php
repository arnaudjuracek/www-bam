<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <ul class="grid-items">
    <?php // for ($i=0; $i < 10; $i++) : ?>
    <?php foreach ($page->children()->visible() as $item): ?>
      <?php snippet('preview.' . $item->intendedTemplate(), ['page' => $item]) ?>
    <?php endforeach ?>
    <?php // endfor ?>
  </ul>
  <aside class="outside"></aside>
</main>

<?php snippet('footer') ?>
