<li class="grid-item preview-job">
  <div class="preview-job-container">
    <div class="preview-job-cover">
      <div class="preview-job-cover-content">
        <div class="preview-job-tag">
          <?php echo $page->title()->headertml() ?>
        </div>
      </div>
    </div>
    <section class="preview-job-body">
      <header class="preview-job-header">
        <?php if ($page->metas()->isNotEmpty()) : ?>
          <ul class="preview-job-metas">
            <?php foreach ($page->metas()->toStructure() as $meta) : ?>
              <li class="preview-job-meta" <?php ecco($meta->label()->isNotEmpty(), 'data-label="' . $meta->label() . '"') ?>>
                <?php echo $meta->value()->kirbytext() ?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </header>
      <div class="preview-job-content">
        <?php echo $page->text()->kirbytext() ?>
      </div>
    </section>
  </div>
</li>
