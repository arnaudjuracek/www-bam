<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<?php snippet('menu') ?>

<main>
  <ul class="grid-items">
    <?php
      // NOTE: an archive is an event with at least one visible child
      $param = param('archives', false);
      $events = $param
        ? $page
          ->children()
          ->filter(function ($p) {
            return $p->hasVisibleChildren();
          })
          ->filter(function ($p) use ($param) {
            if ($param == 'tout') return true;
            foreach (str::split($p->tags(), ',') as $tag) {
              if ($param == str::slug($tag)) return true;
            }
          })
        : $page->children()->visible();

      foreach ($events->sortBy('date', 'desc') as $event) {
        snippet('preview.event', [
          'page' => $event,
          'disable_past_event' => !$param
        ]);
      }
    ?>
  </ul>
  <aside class="outside"></aside>
</main>

<?php snippet('footer') ?>
