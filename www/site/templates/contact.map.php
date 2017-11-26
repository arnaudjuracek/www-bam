<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <article class="contact">

    <ul class="contact-informations">
      <div class="contact-information-column">
        <?php foreach ($page->left()->toStructure() as $info): ?>
          <li class="contact-information" <?php ecco($info->label()->isNotEmpty(), 'data-label="' . $info->label() . '"') ?>>
            <?php echo $info->value()->kt() ?>
          </li>
        <?php endforeach ?>
      </div>
      <div class="contact-information-column">
        <?php foreach ($page->right()->toStructure() as $info): ?>
          <li class="contact-information" <?php ecco($info->label()->isNotEmpty(), 'data-label="' . $info->label() . '"') ?>>
            <?php echo $info->value()->kt() ?>
          </li>
        <?php endforeach ?>
      </div>
    </ul>

    <section class="contact-map">
      <?php snippet('map') ?>
    </section>
  </article>

  <footer>
    <?php echo $site->footer()->kirbytext() ?>
  </footer>
</main>

<?php snippet('footer') ?>
