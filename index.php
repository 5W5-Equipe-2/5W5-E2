<?php
/**
 * Modèle par défaut
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main">
<h5>index.php</h5>
<?php
    if (have_posts()): 
        while (have_posts()) : the_post();
            the_title('<h1>','</h1>');
            the_content(); ?>
            <hr>
        <?php endwhile;
    endif;
?>
</main>
<?php get_footer(); ?>