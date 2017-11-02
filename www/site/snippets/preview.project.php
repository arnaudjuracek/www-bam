<li class="grid-item preview-project" data-uid="<?php echo $page->uid() ?>">
  <a class="grid-item-link preview-project-content" href="<?php echo $page->url() ?>">
    <figure class="preview-project-cover">
      <?php if ($cover = $page->image($page->cover())): ?>
        <img src="<?php echo $cover->focusCrop(400)->url() ?>">
      <?php endif ?>
    </figure>
  </a>
</li>
