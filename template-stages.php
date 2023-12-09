<?php

/**
 * Template name: stages
 * 
 */
?>
<?php get_header(); ?>

<main class="site_main site_main_stages">

    <?php /****** Introduction aux stages *******/ ?>
    <!-- <div class="info_stages"> -->
    <section class="description_stages">
        <?php the_content(); ?>
    </section>
    <hr>
    <!-- </div> -->

    <!-- <hr> -->

    <?php /****** Carrousel des témoignages de stages *******/ ?>
    <section class="temoignage Section_carrousel">
        <h2>Témoignages</h2>
        <div class = "temoignage__article Carrou__article">
        <?php echo do_shortcode('[5w5e2carrousel categories="stages" operator="ET" exclude_categories="" exclude_operator="ET" max_posts="100"]'); ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>