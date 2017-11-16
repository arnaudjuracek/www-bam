<?php foreach ($filters as $text => $link) : ?>
  <?php $isActive = a::get($link, 'isActive', false) ?>

  <li class="internal-navigation-link">
    <a href="<?php echo $link['url'] ?>" class="linkbox <?php ecco($isActive, 'is-active') ?>">
      <?php echo $text ?>
    </a>
  </li>

  <?php if ($isActive && $children = a::get($link, 'children', [])) : ?>
    <ul class="sidebar-filters">
      <?php foreach ($children as $child_key => $child) : ?>
        <?php $isActive = a::get($child, 'isActive', false) ?>
        <li class="sidebar-filter">
          <a href="<?php echo $child['url'] ?>" class="linkbox <?php ecco($isActive, 'is-active') ?>" data-depth="1">
            <?php echo $child_key ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>
<?php endforeach ?>
