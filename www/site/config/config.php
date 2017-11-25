<?php

@include __DIR__ . DS . 'license.php';

/*
---------------------------------------
Kirby Configuration
---------------------------------------
*/

c::set([
  'widget.backup.include_site'     => true,
  'plugin.footnotes.scroll'        => false,
  'panel.kirbytext'                => false,
  'error'                          => 'erreur',

  'routes' => [
    array(
      // Redirect all top pages (except events) to their first child
      'pattern' => '(:any)',
      'action'  => function ($uid) {
        if ($topPage = page($uid)) {
          $page = $topPage->children()->visible()->first();
          if (!$page || $uid == 'evenements') {
            site()->visit($topPage);
            return $topPage;
          }

          go($page->url());
        } else go('erreur');
      }
    ),
    array(
      // Force project redirection to their first child
      'pattern' => 'projets/(:any)/(:any)',
      'action'  => function ($folder, $uid) {
        $page = page('projets/' . $folder . '/' . $uid);
        if (!$page) return go('erreur');

        $firstVisibleChild = $page->children()->visible()->first();
        if (!$firstVisibleChild) return $page;

        go($firstVisibleChild);
      }
    ),
    array(
      // Hijack sidebar when inside a project
      'pattern' => 'projets/(:any)/(:any)/(:all)',
      'action'  => function ($folder, $uid, $sub) {
        $project = page('projets/' . $folder . '/' . $uid);
        if (!$project) return go('erreur');

        $page = $project->find($sub);
        if (!$page) return go('erreur');

        site()->visit($page);
        return [$page, ['hijack_sidebar' => $project]];
      }
    ),
    array(
      // Hijack sidebar when inside an event
      // Hijack article metas with event metas
      'pattern' => 'evenements/(:any)/(:all)',
      'action'  => function ($uid, $sub) {
        $project = page('evenements/' . $uid);
        if (!$project) return go('erreur');

        $page = $project->find($sub);
        if (!$page) return go('erreur');

        $page->metas = $project->metas();
        site()->visit($page);
        return [$page, ['hijack_sidebar' => $project]];
      }
    ),
    array(
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
    )
  ]
]);
