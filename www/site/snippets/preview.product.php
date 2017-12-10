<li class="grid-item preview-product" data-fade-direction="left">
  <div class="preview-product-container">
    <figure class="preview-product-cover">
      <?php if ($cover = $page->image($page->cover())): ?>
        <img src="<?php echo $cover->focusCrop(400)->url() ?>">
      <?php endif ?>
    </figure>
    <section class="preview-product-body">
      <header class="preview-product-header">
        <h2 class="preview-product-title">
          <?php echo $page->title()->html() ?>
        </h2>
        <?php if ($page->metas()->isNotEmpty()) : ?>
          <ul class="preview-product-metas">
            <?php foreach ($page->metas()->toStructure() as $meta) : ?>
              <li class="preview-product-meta" <?php ecco($meta->label()->isNotEmpty(), 'data-label="' . $meta->label() . '"') ?>>
                <?php echo $meta->value()->kirbytext() ?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </header>
      <div class="preview-product-content">
        <?php echo $page->text()->kirbytext() ?>
      </div>
    </section>
  </div>
</li>
