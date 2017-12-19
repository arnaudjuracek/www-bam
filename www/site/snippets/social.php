<ul class="social-links">
  <li class="social-link">
    <a href="<?php echo page('contact')->url() ?>">
      <?php snippet('icons/contact') ?>
    </a>
  </li>

  <?php if ($site->twitter()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->twitter()->url() ?>">
        <?php snippet('icons/twitter') ?>
      </a>
    </li>
  <?php endif ?>

  <?php if ($site->instagram()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->instagram()->url() ?>">
        <?php snippet('icons/instagram') ?>
      </a>
    </li>
  <?php endif ?>

  <?php if ($site->facebook()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->facebook()->url() ?>">
        <?php snippet('icons/facebook') ?>
      </a>
    </li>
  <?php endif ?>

  <?php if ($site->linkedin()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->linkedin()->url() ?>">
        <?php snippet('icons/linkedin') ?>
      </a>
    </li>
  <?php endif ?>

</ul>
