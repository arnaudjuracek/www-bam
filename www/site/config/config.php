<?php

@include __DIR__ . DS . 'license.php';

/*
---------------------------------------
Kirby Configuration
---------------------------------------
*/

c::set('widget.backup.include_site', true);
c::set('plugin.footnotes.scroll', true);
c::set('plugin.footnotes.scroll.offset', -350);

c::set('error', 'erreur');

c::set('routes', [
  [
    // Redirect all top pages to their first child
    'pattern' => '(:any)',
    'action'  => function ($uid) {
      if ($topPage = page($uid)) {
        $page = $topPage->children()->visible()->first();
        if(!$page) return $topPage;

        go($page->url());
      } else go('erreur');
    }
  ],
  [
    // SEE https://github.com/arnaudjuracek/kirby-backup-widget#security
    'pattern' => 'content/backups/(:any)',
    'action' => function ($file) {
      if (site()->user()) {
        // only logged users have access to content/backups files
        page('backups')->files()->find($file)->download();
      } else {
        header::forbidden();
        die('Unauthorized access');
      }
    }
  ]
]);
