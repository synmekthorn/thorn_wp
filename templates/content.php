<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">

      <article <?php post_class('card mb-5 shadow-sm'); ?> id="post-<?php the_ID(); ?>">

        <?php if (has_post_thumbnail()) : ?>
          <a href="<?php the_permalink(); ?>" class="card-img-top d-block overflow-hidden">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded-top']); ?>
          </a>
        <?php endif; ?>

        <div class="card-body">
          <h2 class="card-title h4">
            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
              <?php the_title(); ?>
            </a>
          </h2>

          <div class="card-meta text-muted mb-3">
            <small>
              <i class="fa-solid fa-calendar-days me-1"></i> <?php echo get_the_date(); ?>
              <span class="mx-2">•</span>
              <i class="fa-solid fa-user me-1"></i> <?php the_author_posts_link(); ?>
            </small>
          </div>

          <div class="card-text">
            <?php the_excerpt(); ?>
          </div>

          <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary mt-3">
            <?php _e('Continue Reading', 'thorn'); ?>
          </a>
        </div>

        <?php if (has_tag()) : ?>
          <div class="card-footer bg-white border-top small text-muted">
            <?php the_tags('<span class="badge bg-light text-dark me-1"><i class="fa-solid fa-tag me-1"></i>', '</span><span class="badge bg-light text-dark me-1"><i class="fa-solid fa-tag me-1"></i>', '</span>'); ?>
          </div>
        <?php endif; ?>

      </article>

    </div>
  </div>
</div>
