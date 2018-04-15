<?php
  // If a page is passed through the snippet, use it
  // else, use the topest page available
$top = getTopLevelPage($page);
$p = isset($hijack_sidebar) ? $hijack_sidebar : $top;
?>

<aside class="sidebar">
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
    <h1 class="sidebar-title"><a id="goTop" href="#"><?php echo $p->title()->html() ?></a></h1>
  </header>

  <div class="sidebar-scroll-wrapper">
    <div class="sidebar-scroll-content">
      <?php if (isset($hijack_sidebar) || isset($metas)) : ?>
        <ul class="sidebar-metas">
          <?php if (isset($metas)) : ?>
            <?php foreach ($metas as $meta) : ?>
              <li class="sidebar-meta"><?php echo widont($meta) ?></li>
            <?php endforeach ?>
          <?php endif ?>
        </ul>
      <?php endif ?>
      <?php if ($p->description()->isNotEmpty()): ?>
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
</aside>

