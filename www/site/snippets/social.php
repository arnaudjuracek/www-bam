<ul class="social-links">
  <li class="social-link <?php ecco(page('contact')->isOpen() || page('contact')->isActive() , 'is-active') ?>">
    <a href="<?php echo page('contact')->url() ?>">
      <?php snippet('icons/contact_fill') ?>
    </a>
  </li>

  <?php if ($site->twitter()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->twitter()->url() ?>">
        <?php snippet('icons/twitter_fill') ?>
      </a>
    </li>
  <?php endif ?>

  <?php if ($site->instagram()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->instagram()->url() ?>">
        <?php snippet('icons/instagram_fill') ?>
      </a>
    </li>
  <?php endif ?>

  <?php if ($site->facebook()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->facebook()->url() ?>">
        <?php snippet('icons/facebook_fill') ?>
      </a>
    </li>
  <?php endif ?>

  <?php if ($site->linkedin()->isNotEmpty()): ?>
    <li class="social-link">
      <a href="<?php echo $site->linkedin()->url() ?>">
        <?php snippet('icons/linkedin_fill') ?>
      </a>
    </li>
  <?php endif ?>

</ul>
