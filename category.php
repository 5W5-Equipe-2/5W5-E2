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
    ?>


    <!-- Navigation par catégories / filtres (div) -->

   <?php 
      if (in_category('evenements')) {
      $ma_categorie = "evt";
    }
if (in_category('projets')) {
      $ma_categorie = "projet";
    } 
  
   wp_nav_menu(array(
     "theme_location" => $ma_categorie,
        "container" => "div",    
        "container_class" => "menu-trier"
    )); ?>

<?php
    /****Localiser et assigner un template-part*********************************/
    //Assigner le modèle de template-part personnalisé 
    $categorie_modele = locate_template('template-parts/categorie-' . $categorie->slug . '.php');

    // Si le modèle n'est pas trouvé et que la catégorie actuelle a un parent
    if (empty($categorie_modele) && $categorie->parent != 0) {
    // Récupérer la catégorie parent
    $categorie_parent = get_category($categorie->parent);

    // Tant qu'un modèle personnalisé n'est pas trouvé et qu'il y a un parent
    while (empty($categorie_modele) && $categorie_parent) {
        // Chercher un modèle personnalisé pour la catégorie parente
        $parent_modele = locate_template('template-parts/categorie-' . $categorie_parent->slug . '.php');
        if (!empty($parent_modele)) {
            $categorie_modele = $parent_modele;
            break;
        }

        // Si le modèle n'est pas trouvé pour la catégorie parente, chercher le parent de la catégorie parente
        $categorie_parent = get_category($categorie_parent->parent);
    }
}

    // Utiliser le modèle par défaut si un modèle personnalisé n'existe pas
    if (empty($categorie_modele)) {
        $categorie_modele = locate_template('template-parts/categorie-defaut.php');
    }
    ?>

    <!-- Affichage dans WordPress --------------------------------------------------->
    <!--     <h2 class=""><?php echo $categorie->name ?></h2> -->
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