<li class="grid-item preview-member">
  <a class="grid-item-link preview-member-content" href="<?php echo $page->url() ?>">
    <figure class="preview-member-cover">
      <?php if ($cover = $page->image($page->cover())): ?>
        <img src="<?php echo $cover->focusCrop(400)->url() ?>">
      <?php endif ?>
    </figure>
    <ul class="preview-member-infos">
      <li class="preview-member-info preview-member-info-name">
        <?php echo $page->title()->html() ?>
      </li>
      <li class="preview-member-info preview-member-info-role">
        <?php ecco($page->role(), str_replace(',', '&nbsp;- ', $page->role()->value())) ?>
      </li>
      <li class="preview-member-info preview-member-info-job">
        <?php ecco($page->job(), str_replace(',', '&nbsp;- ', $page->job()->value())) ?>
      </li>
    </ul>
  </a>
</li>
