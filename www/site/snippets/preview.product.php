<li class="grid-item preview-product">
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
        <ul class="preview-product-metas">
          <li class="preview-product-meta">
            <a class="preview-product-link" href="<?php echo $page->link() ?>" target="_blank">
              <?php echo $page->link() ?>
            </a>
          </li>
        </ul>
      </header>
      <div class="preview-product-content">
        <?php echo $page->text()->kirbytext() ?>
      </div>
    </section>
  </div>
</li>
