<?php get_template_part('templates/page', 'header'); ?>

  <?php if (!have_posts()) : ?>
    <section class="no-results not-found">
      <header class="page-header">
        <h1 class="page-title"><?php _e('Nothing Found', 'thorn'); ?></h1>
      </header>
      <div class="page-content">
        <p><?php _e('Sorry, no results were found. Try searching for something else.', 'thorn'); ?></p>
        <?php get_search_form(); ?>
      </div>
    </section>
  <?php else : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php
        /**
         * Load the appropriate content template based on post type or format
         * Priority: custom post type > post format > default
         */
        get_template_part(
          'templates/content',
          get_post_type() !== 'post' ? get_post_type() : get_post_format()
        );
      ?>
    <?php endwhile; ?>

    <nav class="navigation posts-navigation" role="navigation" aria-label="<?php esc_attr_e('Posts Navigation', 'thorn'); ?>">
      <?php the_posts_navigation(); ?>
    </nav>
  <?php endif; ?>
