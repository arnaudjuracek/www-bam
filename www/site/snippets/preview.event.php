<li class="grid-item preview-event <?php ecco($disable_past_event && $page->date() + 24*60*60 < time() ,'is-past') ?>" data-fade-direction="left">
  <div class="preview-event-container">
    <div class="preview-event-cover">
      <div class="preview-event-cover-content">
        <time class="preview-event-date" datetime="<?php echo $page->date('c') ?>">
          <?php echo $page->date('d/m/Y') ?>
        </time>
        <div class="preview-event-tag">
          <?php echo str_replace(',', ', ', $page->tags()) ?>
        </div>
      </div>
    </div>
    <section class="preview-event-body">
      <header class="preview-event-header">
        <h2 class="preview-event-title">
          <?php if ($page->hasVisibleChildren()) : ?>
            <a href="<?php echo $page->children()->visible()->first()->url() ?>">
              <?php echo $page->title()->html() ?>
            </a>
          <?php else: ?>
            <?php echo $page->title()->html() ?>
          <?php endif ?>
        </h2>
        <?php if ($page->metas()->isNotEmpty()) : ?>
          <ul class="preview-event-metas">
            <?php foreach ($page->metas()->toStructure() as $meta) : ?>
              <li class="preview-event-meta" <?php ecco($meta->label()->isNotEmpty(), 'data-label="' . $meta->label() . '"') ?>>
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
