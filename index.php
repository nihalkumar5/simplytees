<?php
/**
 * Main Template File (Fallback)
 */
get_header();
?>

<main id="main" class="section-pad">
    <div style="max-width: 1200px; margin: 0 auto; padding: 4rem 2rem;">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1><?php the_title(); ?></h1>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No content found.</p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
