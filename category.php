<?php

/**
 * Modèle category par défaut
 * 
 */
?>
<?php get_header(); ?>

<main class="site_main">
    <?php
     /****Requêtes SQL de WP****************************************************/
    $categorie = get_queried_object();
    $args = array(
        'category_name' => $categorie->slug,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);

    /****Localiser et assigner un template-part*********************************/
    //Assigner le modèle de template-part personnalisé 
    $categorie_modele = locate_template('template-parts/categorie-' . $categorie->slug . '.php');
    
    // Utiliser le modèle par défaut si un modèle personnalisé n'existe pas
    if (empty($categorie_modele)) {
        $categorie_modele = locate_template('template-parts/categorie-defaut.php');
    }
    ?>

    <!-- Affichage dans WordPress --------------------------------------------------->
    <h2 class=""><?php echo $categorie->name ?></h2>
    <section class="">
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Inclure le modèle personnalisé ou le modèle par défaut
                include $categorie_modele;
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </section>
</main>

<?php get_footer(); ?>