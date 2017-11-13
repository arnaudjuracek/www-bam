<?php snippet('header') ?>
<?php snippet('sidebar', [
  'hijack_sidebar' => $page,
  'metas' => [
    $page->role() ? str_replace(',', '&nbsp;- ', $page->role()->value()) : '',
    $page->job() ? str_replace(',', '&nbsp;- ', $page->job()->value()) : '',
  ]
]) ?>
<?php snippet('menu') ?>

<main>
  <article class="article-member">
    <header>
      <?php if ($cover = image($page->cover())): ?>
        <figure>
          <img src="<?php echo $cover->url() ?>" alt="Photo de profil">
        </figure>
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
