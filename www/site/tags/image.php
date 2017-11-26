<?php

kirbytext::$tags['image'] = [
  'attr' => [
    'width',
    'height',
    'alt',
    'text',
    'title',
    'class',
    'imgclass',
    'linkclass',
    'caption',
    'link',
    'target',
    'popup',
    'rel'
  ],
  'html' => function ($tag) {
    $url     = $tag->attr('image');
    $alt     = $tag->attr('alt');
    $title   = $tag->attr('title');
    $link    = $tag->attr('link');
    $caption = $tag->attr('caption');
    $file    = $tag->file($url);
    // use the file url if available and otherwise the given url
    $url = $file ? $file->url() : url($url);
    if (!$file) return null;

    $ratio   = $file->ratio();
    // alt is just an alternative for text
    if ($text = $tag->attr('text')) $alt = $text;
    // try to get the title from the image object and use it as alt text
    if ($file) {
      if (empty($alt) and $file->alt() != '') $alt = $file->alt();
      if (empty($title) and $file->title() != '') $title = $file->title();
    }
    // at least some accessibility for the image
    if (empty($alt)) $alt = ' ';
    // link builder
    $_link = function ($image) use ($tag, $url, $link, $file) {
      if (empty($link)) return $image;
      // build the href for the link
      if ($link == 'self') $href = $url;
      else if ($file and $link == $file->filename()) $href = $file->url();
      else if ($tag->file($link)) $href = $tag->file($link)->url();
      else $href = $link;

      return html::a(url($href), $image, array(
        'rel'    => $tag->attr('rel'),
        'class'  => $tag->attr('linkclass'),
        'title'  => $tag->attr('title'),
        'target' => $tag->target()
      ));
    };

    // image builder
    $_image = function ($class) use ($tag, $url, $alt, $title) {
      return html::img($url, [
        'width'    => $tag->attr('width'),
        'height'   => $tag->attr('height'),
        'class'    => $class,
        'title'    => $title,
        'alt'      => $alt
      ]);
    };

    $_image_lazy = function ($class) use ($tag, $url, $alt, $title) {
      return html::img('data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==', [
        'data-src' => $url,
        'width'    => $tag->attr('width'),
        'height'   => $tag->attr('height'),
        'class'    => $class,
        'title'    => $title,
        'alt'      => $alt
      ]);
    };

    $noscript = new Brick('noscript');
    $noscript->append($_link($_image($tag->attr('imgclass'))));

    $image  = $_link($_image_lazy($tag->attr('imgclass')));
    $figure = new Brick('figure');
    $figure->addClass('lazyload');

    // force ratio to avoid page reflow
    // SEE http://dinbror.dk/blog/blazy/?ref=example-page#Responsive
    $figure->attr('style', 'padding-bottom: ' . (1 / $ratio) * 100 . '%');
    $figure->addClass('is-forced-ratio');

    $figure->addClass($tag->attr('class'));
    $figure->append($image);
    $figure->append($noscript);
    if (!empty($caption)) {
      $figure->append('<figcaption>' . html($caption) . '</figcaption>');
    }
    return $figure;
  }
];
