<input type="checkbox" class="menu-mobile-toggle" id="menuMobileToggle" style="display:none"/>
<label for="menuMobileToggle" class="menu-mobile-toggle-label"></label>

<nav class="menu-mobile" style="display:none">
  <header class="menu-mobile-header">
    <div class="menu-mobile-header-logo">
    <a href="<?php echo $site->url() ?>">
      <img src="<?php echo $kirby->urls()->assets() ?>/images/logo-inline.svg">
    </a>
  </div>
  </header>
  <ul class="menu-mobile-links">
    <?php foreach ($pages->visible() as $item): ?>
      <li class="menu-mobile-links-category <?php ecco($item->isOpen(), 'is-open') ?>" data-category="<?php echo $item->uid() ?>">
        <h2 class="menu-mobile-links-category-title">
          <div class="menu-mobile-links-category-title-icon"><?php snippet('icons/' . $item->uid()) ?></div>
          <span><?php echo $item->title()->html() ?></span>
        </h2>
        <ul class="menu-mobile-links-category-links">
          <?php if ($item->is($site->find('evenements'))): ?>
            <?php foreach ([
              "Calendrier" => $item->url(),
              "Archives" => $item->url() . '/archives:tout',
            ] as $title => $url) : ?>
              <li class="internal-navigation-link"><a class="linkbox" href="<?php echo $url ?>"><?php echo $title ?></a></li>
            <?php endforeach ?>
          <?php else: ?>
            <?php foreach ($item->children()->visible() as $sub): ?>
              <li class="internal-navigation-link">
                <a class="linkbox <?php ecco($sub->isActive(), 'is-active') ?>" href="<?php echo $sub->url() ?>">
                  <?php echo $sub->title()->html() ?>
                </a>
              </li>
            <?php endforeach ?>
          <?php endif ?>
        </ul>
      </li>
    <?php endforeach ?>
  </ul>

  <footer class="menu-mobile-footer">
    <?php snippet('social') ?>
  </footer>
</nav>
