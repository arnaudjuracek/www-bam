<?php foreach ($p->children()->visible() as $child): ?>
  <?php $isActive = $child->isActive() ?>
  <li class="internal-navigation-link">
    <a class="linkbox <?php ecco($isActive, 'is-active') ?>" href="<?php echo $child->url() ?>">
      <?php echo $child->title()->html() ?>
    </a>
  </li>

  <?php if ($isActive): ?>
    <?php echo $page->text()->toc(1) ?>
  <?php endif ?>
<?php endforeach ?>
