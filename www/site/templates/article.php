<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <article>
    <header>
      <h1><?php echo $page->title()->html() ?></h1>
      <?php if ($page->abstract()->isNotEmpty()): ?>
        <div class="article-abstract">
          <?php echo $page->abstract()->kirbytext() ?>
        </div>
      <?php endif ?>
    </header>
    <?php
      echo $page
        ->text()
        ->anchors()
        ->kirbytext()
        ->footnotes(['bibliography' => false])
    ?>
  </article>
  <aside class="outside outside-footnotes">
    <ul class="metas">
      <?php foreach ($page->metas()->toStructure() as $meta): ?>
        <li class="meta">
          <?php snippet('icons/' . $meta->icon()) ?>
          <?php echo $meta->value()->kirbytext() ?>
        </li>
      <?php endforeach ?>
    </ul>
    <?php echo KirbyFootnotes::bibliography($page->text()) ?>
  </aside>

  <footer>
    <?php echo $site->footer()->kirbytext() ?>
  </footer>
</main>

<?php snippet('footer') ?>
