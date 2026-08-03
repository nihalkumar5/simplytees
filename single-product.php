<?php
/**
 * WooCommerce Single Product Template
 */
get_header();
?>

<main id="main" class="section-pad single-product-page" style="padding-top: 100px;">
  <div style="max-width: 1400px; margin: 0 auto; padding: 2rem;">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php wc_get_template_part( 'content', 'single-product' ); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php
get_footer();
