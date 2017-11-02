<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <header>
    <h1><?php echo $page->title()->html() ?></h1>
  </header>
  <ul class="grid-items">
    <?php for ($i=0; $i < 10; $i++) : ?>
    <?php foreach ($page->children()->visible() as $item): ?>
      <?php snippet('preview.' . $item->intendedTemplate(), ['page' => $item]) ?>
    <?php endforeach ?>
    <?php endfor ?>
  </ul>
</main>

<?php snippet('footer') ?>
