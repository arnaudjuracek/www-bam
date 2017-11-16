<iframe
  width="100%"
  height="600"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=<?php echo c::get('google-map.api-key') ?>
    &q=<?php echo escape::url($page->address()) ?>&language=FR" allowfullscreen>
</iframe>

