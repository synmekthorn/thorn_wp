<?php

use Synmek\Thorn\Setup;
use Synmek\Thorn\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <?php
      do_action('wp_body_open'); // ✅ For accessibility & compatibility

      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <div class="wrapper" role="document">
      <main class="main" id="main-content" tabindex="-1">
        <?php include Wrapper\template_path(); ?>
      </main>
    </div>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>