<li class="grid-item preview-product">
  <div class="preview-product-content">
    <figure class="preview-product-cover">
      <?php if ($cover = $page->image($page->cover())): ?>
        <img src="<?php echo $cover->focusCrop(400)->url() ?>">
      <?php endif ?>
    </figure>
    <ul class="preview-product-infos">
      <li class="preview-product-info preview-product-info-name">
        <?php echo $page->title()->html() ?>
      </li>
      <li class="preview-product-info preview-product-info-role">
        <a class="preview-product-link" href="<?php echo $page->link() ?>" target="_blank">
          <?php echo $page->link() ?>
        </a>
      </li>
      <li class="preview-product-info preview-product-info-description">
        <?php echo $page->text()->kirbytext() ?>
      </li>
    </ul>
  </div>
</li>
