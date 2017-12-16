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
        'url' => url_param(['archives' => str::slug($tag)], $page),
        'isActive' => param('archives') == str::slug($tag) || param('archives') == 'tout'
      ];
    }

    return [
      'filters' => [
        'calendrier' => [
          'url' => $page->url(),
          'isActive' => !param('archives', false)
        ],
        'archives' => [
          'url' => url_param(['archives' => 'tout'], $page),
          'isActive' => param('archives', false),
          'children' => $filters
        ]
      ]
    ];
  };
