<?php

  function url_param ($params, $page) {
    return url($page->url() . '/' . url::paramsToString($params));
  }

  return function ($site, $pages, $page) {
    $filters = [];
    $tags = $page
      ->children()
      ->visible()
      ->filter(function ($p) {
        return $p->hasVisibleChildren();
      })
      ->pluck('tags', ',', true);
    foreach ($tags as $tag) {
      $filters[$tag] = [
        'url' => url_param(['restitutions' => str::slug($tag)], $page),
        'isActive' => param('restitutions') == str::slug($tag) || param('restitutions') == 'tout'
      ];
    }

    return [
      'filters' => [
        'calendrier' => [
          'url' => $page->url(),
          'isActive' => !param('restitutions', false)
        ],
        'restitutions' => [
          'url' => url_param(['restitutions' => 'tout'], $page),
          'isActive' => param('restitutions', false),
          'children' => $filters
        ]
      ]
    ];
  };
