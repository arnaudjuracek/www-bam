<?php

  // globally available helpers function
  function getTopLevelPage ($page) {
    if ($page->depth() === 1) return $page;

    $parents = $page->parents();
    return $parents->last();
  }
