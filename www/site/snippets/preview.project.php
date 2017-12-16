<li class="grid-item preview-project" data-uid="<?php echo $page->uid() ?>">
  <a class="grid-item-link preview-project-content" href="<?php echo $page->url() ?>">
    <figure class="preview-project-cover">
      <?php if ($cover = $page->image($page->cover())): ?>
        <img src="<?php echo $cover->focusCrop(400)->url() ?>">
      <?php endif ?>
    </figure>
    <aside class="preview-project-infos">
      <h2 class="preview-project-title">
        <?php echo $page->title()->html() ?>
      </h2>
      <div class="preview-project-info">
        <?php echo $page->description()->kt() ?>
      </div>
    </aside>
  </a>
</li>
