<?php
  // If a page is passed through the snippet, use it
  // else, use the topest page available
  $top = getTopLevelPage($page);
  $p = isset($hijack_sidebar) ? $hijack_sidebar : $top;
?>

<aside class="sidebar" <?php ecco($p->hasVisibleChildren(), 'mobile-expandable') ?>>
  <input type="checkbox" class="sidebar-mobile-toggle-expand" id="sidebarMobileExpandToggler" style="display:none"/>
  <label for="sidebarMobileExpandToggler" class="sidebar-mobile-toggle-expand-label"></label>
  <label for="sidebarMobileExpandToggler" class="sidebar-mobile-toggle-expand-label-overlay"></label>

  <header class="sidebar-header">
    <div class="sidebar-icon">
      <?php
        $icon = snippet('icons/' . $top->uid(), [], true);
        if (!$icon) $icon = snippet('icons/web', [], true);
      ?>
      <?php if (isset($hijack_sidebar)) : ?>
        <a href="<?php echo $top->url() ?>">
          <span class="sidebar-icon-back-arrow"><?php snippet('icons/back-arrow') ?></span>
          <?php echo $icon ?>
        </a>
      <?php else : ?>
        <?php echo $icon ?>
      <?php endif ?>
    </div>
    <h1 class="sidebar-title"><?php echo $p->title()->html() ?></h1>
  </header>

  <div class="sidebar-mobile-expand-wrapper">
    <div class="sidebar-scroll-wrapper">
      <div class="sidebar-scroll-content">
        <?php if (isset($metas)) : ?>
          <ul class="sidebar-metas">
            <?php foreach ($metas as $meta) : ?>
              <li class="sidebar-meta">
                <?php echo $meta ?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php else: ?>
          <aside class="sidebar-abstract">
            <?php echo $p->description()->kirbytext() ?>
          </aside>
        <?php endif ?>

        <nav class="internal-navigation">
          <ul class="internal-navigation-links">
            <?php
              if (isset($filters)) snippet('sidebar.nav-filters');
              else snippet('sidebar.nav-default', ['p' => $p]);
            ?>
          </ul>
        </nav>
      </div>
    </div>

    <footer class="sidebar-footer">
      <?php snippet('social') ?>
    </footer>
  </div>
</aside>

