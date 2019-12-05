<?php snippet('header') ?>

<section class="splashscreen">
  <?php snippet('menu') ?>

  <div class="splashscreen-wrapper">
    <div class="splashscreen-logo">
      <a href="<?php echo page('collectif-bam')->url() ?>">
        <img src="<?php echo $kirby->urls()->assets() ?>/images/logo-full.svg">
      </a>
    </div>

    <div class="splashscreen-baseline">
      <?php echo $page->text()->html() ?>
    </div>

    <div class="splashscreen-hometext">
      <?php echo $site->hometext()->kirbytext() ?>
    </div>
  </div>

  <footer class="splashscreen-footer">
    <?php snippet('social') ?>
  </footer>
</section>

<?php snippet('footer') ?>
