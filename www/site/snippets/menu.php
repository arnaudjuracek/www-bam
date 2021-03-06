<?php snippet('menu.mobile') ?>

<nav class="menu" role="main">
  <ul class="links">
    <?php foreach ($pages->visible() as $item) : ?>
      <li class="link" data-category="<?php echo $item->uid() ?>">
        <a href="<?php echo $item->url() ?>" class="<?php ecco($item->isOpen() || $item->isActive() , 'is-active') ?>">
          <div class="link-icon">
            <?php snippet('icons/' . $item->uid()) ?>
          </div>
          <div class="link-text">
            <?php echo $item->title()->html() ?>
          </div>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</nav>
