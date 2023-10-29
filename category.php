<?php

/**
 * Modèle category.php 
 * 
 */
?>
<?php
/****Requêtes SQL de WP*********************************************************/
$categorie = get_queried_object();
$args = array(
    'category_name' => $categorie->slug,
    'orderby' => 'title',
    'order' => 'ASC'
);
$query = new WP_Query($args);
$cat_slug =  $categorie->slug;
?>


<?php
/****Récupérer le nom de la catégorie à partir de l'url *********************************************************/
// Récupérez l'URL actuelle
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Extrait le dernier segment de l'URL
$segments = explode('/', rtrim($url, '/'));
$categorie_slug = end($segments);
?>


<?php
// Rechercher un modèle de catégorie en fonction du slug
$categorie_modele = locate_template('template-parts/categorie-' . $cat_slug . '.php');

// Si un modèle n'est pas trouvé pour la catégorie actuelle, recherchez le modèle du parent
if (empty($categorie_modele)) {
    $parent_cat = get_term_by('id',  $categorie->parent, 'category'); // Récupérer la catégorie parente

    // Tant qu'il y a une catégorie parente et que le modèle n'a pas été trouvé
    while ($parent_cat && empty($categorie_modele)) {
        $parent_slug = $parent_cat->slug;
        $categorie_modele = locate_template('template-parts/categorie-' . $parent_slug . '.php');
        $parent_cat = get_term_by('id', $parent_cat->parent, 'category'); // Récupérer la catégorie parente suivante
    }
}

// Utiliser le modèle pour projets si c'est aussi dans la catégorie des cours
if (has_term(array('projets','cours'), 'category'))  {
    $categorie_modele = locate_template('template-parts/categorie-projets.php');
}

/* // Utiliser le modèle pour projets si c'est aussi la catégorie des cours
if (has_term(array('cours'), 'category')) {
    $categorie_modele = locate_template('template-parts/categorie-projets.php');
} */

// Utiliser le modèle par défaut si aucun modèle personnalisé n'est pas trouvé
if (empty($categorie_modele)) {
    $categorie_modele = locate_template('template-parts/categorie-defaut.php');
}
?>
<!---------------------  Affichage dans WordPress********************************* -->

<!-- Entête    ************************ -->
<?php get_header(); ?>

<!-- Aside    *************************  -->
<?php //Si c'est les catégories evenements et projets
if (!is_front_page() && (!is_admin()) && (has_term(array('projets', 'evenements'), 'category'))) {
    get_template_part("template-parts/aside");
}
?>

<main class="site_main">

<?php //Si c'est la catégorie Projets, on affiche le nom de la catégorie 

if (has_term(array('projets'), 'category')) {
    echo '<h2>' . $categorie->name . '</h2>';
}
?>

    <section class="categorie__section">
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Charger le modèle pour la catégorie
                if (!empty($categorie_modele)) {
                    include($categorie_modele);
                }
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </section>
</main>

<?php get_footer(); ?>