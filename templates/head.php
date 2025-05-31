<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Theme color for mobile browsers -->
  <meta name="theme-color" content="#ffffff">

  <!-- Favicon & App Icons -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">

  <!-- Performance Optimizations -->
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- WordPress & Plugin Hook -->
  <?php wp_head(); ?>
</head>
