<li class="grid-item preview-event <?php ecco($disable_past_event && $page->date() + 24*60*60 < time() ,'is-past') ?>">
  <div class="preview-event-container">
    <div class="preview-event-cover">
      <div class="preview-event-cover-content">
        <h2 class="preview-event-tag">
          <?php if ($page->hasVisibleChildren()) : ?>
            <a href="<?php echo $page->children()->visible()->first()->url() ?>">lien</a>
          <?php endif ?>
          <?php echo $page->tags()->html() ?>
        </h2>
        <time class="preview-event-date" datetime="<?php echo $page->date('c') ?>">
          <?php echo $page->date('d/m/Y') ?>
        </time>
      </div>
    </div>
    <section class="preview-event-body">
      <header class="preview-event-header">
        <h3 class="preview-event-title preview-event-meta">
          <?php echo $page->title()->html() ?>
        </h3>
        <?php if ($page->metas()->isNotEmpty()) : ?>
          <ul class="preview-event-metas">
            <?php foreach ($page->metas()->toStructure() as $meta) : ?>
              <li class="preview-event-meta">
                <?php snippet('icons/' . $meta->icon()) ?>
                <?php echo $meta->value()->kirbytext() ?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </header>
      <div class="preview-event-content">
        <?php echo $page->description()->kirbytext() ?>
      </div>
    </section>
  </div>
</li>
