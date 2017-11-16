<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <article class="contact">
    <ul class="contact-informations">
      <?php foreach ($page->metas()->toStructure() as $info): ?>
        <li class="contact-information">
          <?php snippet('icons/' . $info->icon()) ?>
          <?php echo $info->value()->kt() ?>
        </li>
      <?php endforeach ?>
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
