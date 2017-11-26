<?php // @SEE: https://blog.kissmetrics.com/open-graph-meta-tags ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="cleartype" content="on">

<?php
  $topPage = $page->depth() > 3
    ? $page->parents()->filter(function ($p) { return $p->depth() <= 3; })->first()
    : $page;

  $colors = [
    'collectif-bam' => ['#FF4825', '#D14627'],
    'ecosysteme'    => ['#FFC53D', '#ECA918'],
    'produits'      => ['#D40058', '#960148'],
    'contact'       => ['#8A8A8D', '#646569'],
    'projets'       => ['#0083C7', '#006BA4'],
    'evenements'    => ['#00A787', '#009478'],
    'expertise'     => ['#FF6B00', '#BB470'],
  ];

  $metadatas = [
    'title' => $site->title() . r(!$page->isHomePage(), ' | ' . $topPage->title()),
    'color' => a::get($colors, getTopLevelPage($page)->uid(), array('#2E2A26', '#2E2A26'))[max(0, min($page->depth() - 1, 2) - 1)],
    'cover' => (function () use ($topPage) {
      if ($image = $topPage->cover()->toFile()) {
        return $image->focusCrop(1200, 627)->url();
      }
    })(),
    'twitter' => str_replace('https://twitter.com/', '@', $site->twitter()->value()),
  ];
?>
<title><?php echo $metadatas['title'] ?></title>

<meta name="description" content="<?php echo $site->description()->text() ?>">
<meta name="keywords" content="<?php echo $site->keywords()->text() ?>">

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $kirby->urls()->assets() ?>/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $kirby->urls()->assets() ?>/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="194x194" href="<?php echo $kirby->urls()->assets() ?>/favicons/favicon-194x194.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo $kirby->urls()->assets() ?>/favicons/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $kirby->urls()->assets() ?>/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php echo $kirby->urls()->assets() ?>/favicons/manifest.json">
<link rel="mask-icon" href="<?php echo $kirby->urls()->assets() ?>/favicons/safari-pinned-tab.svg" color="#2cd982">
<link rel="shortcut icon" href="<?php echo $kirby->urls()->assets() ?>/favicons/favicon.ico">

<meta name="application-name" content="<?php echo $site->title() ?>">
<meta name="msapplication-config" content="<?php echo $kirby->urls()->assets() ?>/favicons/browserconfig.xml">
<meta name="theme-color" content="<?php echo $metadatas['color'] ?>">

<meta property="og:url" content="<?php echo $site->url() ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $metadatas['title'] ?>">
<meta property="og:description" content="<?php echo $site->description()->text() ?>">
<meta property="og:site_name" content="<?php echo $site->title() ?>">
<meta property="og:locale" content="fr_FR">
<meta property="og:image" content="<?php echo $metadatas['cover'] ?>">

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo $metadatas['twitter'] ?>">
<meta name="twitter:creator" content="@<?php echo $metadatas['twitter'] ?>">
<meta name="twitter:url" content="<?php echo $site->url() ?>">
<meta name="twitter:title" content="<?php echo $metadatas['title'] ?>">
<meta name="twitter:description" content="<?php echo $site->description()->text() ?>">
<meta name="twitter:image" content="<?php echo $metadatas['cover'] ?>">
