<?php get_header(); ?>

    <section>

        This is a single file

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_time('F jS, Y'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a></p>
                    <p><?php the_content(); ?></p>
                </article>
            <?php endwhile;
        else:
            echo '<p>No content found!</p>';
        endif;
        ?>
    </section>

<?php get_footer();