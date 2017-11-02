<li class="grid-item preview-partner">
  <a class="grid-item-link preview-partner-content" href="<?php echo $page->link() ?>">
    <figure class="preview-partner-cover">
      <?php if ($cover = $page->image($page->cover())): ?>
        <img src="<?php echo $cover->focusCrop(400)->url() ?>">
      <?php endif ?>
    </figure>
  </a>
</li>
